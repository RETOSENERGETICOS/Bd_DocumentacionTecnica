<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Docum;
use App\Models\Tech;
use App\Models\Type;
use App\Models\Area;
use App\Models\Owner;
use App\Models\Family;
use App\Models\File;
use App\Models\Group;
use App\Models\Log;
use App\Models\Tool;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolController extends Controller
{

    public function history(Request $request) {
        return response()->json(Log::with('tool','user')->orderBy('created_at', 'desc')->limit(1000)->get());
    }

    public function index(Request $request) {
        return response()->json(
            Tool::all()->map(static function(Tool $tool) {
                return [
                    'id' => $tool->id,
                    'item' => $tool->item,
                    'docum' => $tool->docum,
                    'tech' => $tool->tech,
                    'type' => $tool->type,
                    'area' => $tool->area,
                    'owner' => $tool->owner
                ];
            })
        );
    }

    public function show(Request $request, Tool $tool) {
        return response()->json([
            'id' => $tool->id,
            'item' => $tool->item,
            'docum' => $tool->docum,
            'tech' => $tool->tech,
            'type' => $tool->type,
            'area' => $tool->area,
            'owner' => $tool->owner,
            'available' => $tool->available,
            'code' => $tool->code,
            'description' => $tool->description,
            'revision' => $tool->revision,
            'author' => $tool->author,
            'language' => $tool->language,
            'year' => $tool->year,
            'files' => $tool->files->map(static function(File $file) {
                return $file->path;
            })
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $tool = $this->createTool($request);
            foreach ($request->documents as $document) {
                $tool->files()->create([
                    'path' => $document
                ]);
            }
            $request->user()->logs()->create([
                'tool_id' => $tool->id,
                'comment' => 'Se inserto registro',
                'type'=> 'insert',
                'after' => json_encode($this->getValues($tool->toArray(), $tool))
            ]);
            DB::commit();
            return response()->json(
                $tool
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    public function destroy(Request $request, Tool $tool) {
        DB::beginTransaction();
        try {
            $request->user()->logs()->create([
                'tool_id' => $tool->id,
                'comment' => 'Se elimino registro',
                'type'=> 'delete',
            ]);
            $tool->deleteOrFail();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
        DB::commit();
        return response()->json($tool);
    }

    public function update(Request $request, Tool $tool) {
        DB::beginTransaction();
        try {
            $docum = $this->getDocum($request->docum);
            $tech = $this->getTech($request->tech);
            $type = $this->getType($request->type);
            $area = $this->getArea($request->area);
            $owner = $this->getOwner($request->owner);
            $oldTool = json_encode($this->getValues($tool->toArray(), $tool));
            if ($request->author !== $tool->author) {
                $tool->update([ 'quantity' => $tool->quantity - $request->movingQuantity ]);
                $request->quantity = $request->movingQuantity;
                $tool = $this->createTool($request);
                $request->user()->logs()->create([
                    'tool_id' => $tool->id,
                    'comment' => 'Se traspaso registro',
                    'type'=> 'update',
                    'before' => $oldTool,
                    'after' => json_encode($this->getValues($tool->toArray(), $tool))
                ]);
            } else {
                $tool->update([
                    'docum_id' => $docum->id ?? null,
                    'tech_id' => $tech->id ?? null,
                    'type_id' => $type->id ?? null,
                    'area_id' => $area->id ?? null,
                    'owner_id' => $owner->id ?? null,
                    'available' => $request->available,
                    'code' => $request->code,
                    'description' => $request->description,
                    'revision' => $request->revision,
                    'author' => $request->author,
                    'language' => $request->language,
                    'year' => $request->year
                ]);
                $oldValues = $tool->getChanges();
                if (count($oldValues) > 0) {
                    $request->user()->logs()->create([
                        'tool_id' => $tool->id,
                        'comment' => 'Se edito registro',
                        'type'=> 'update',
                        'before' => $oldTool,
                        'after' => json_encode($this->getValues($oldValues, $tool->refresh()))
                    ]);
                }
            }
            DB::commit();
            return response()->json(
                $tool
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    private function createTool(Request $request) {
        $docum = $this->getDocum($request->docum);
        $tech = $this->getTech($request->tech);
        $type = $this->getType($request->type);
        $area = $this->getArea($request->area);
        $owner = $this->getOwner($request->owner);
        $tool = $request->user()->tools()->create([
            'docum_id' => $docum->id ?? null,
            'tech_id' => $tech->id ?? null,
            'type_id' => $type->id ?? null,
            'area_id' => $area->id ?? null,
            'owner_id' => $owner->id ?? null,
            'available' => $request->available,
            'code' => $request->code,
            'description' => $request->description,
            'revision' => $request->revision,
            'author' => $request->author,
            'language' => $request->language,
            'year' => $request->year
        ]);
        $tool->update([
            'item' => sprintf('DTR%04d', $tool->id)
        ]);
        return $tool->refresh();
    }

    private function getValues($values, Tool $tool) {
//        dd($values, $tool);
        $specialAttributes = ['docum_id' => 'docum','tech_id' => 'tech','type_id' => 'type','area_id' => 'area','owner_id' => 'owner'];
        $names = ['item' => 'Item','docum_id' => 'Tipo de documento/Document type','tech_id' => 'Tecnologia asociada/Associated technology','type_id' => 'Tipo de archivo/Type of file','area_id' => 'Area asociada/Associated area','owner_id' => 'Propietario/Owner',
            'available' => 'Disponible/Available','code' => 'Codigo/Code','description' => 'Descripcion/Description','revision' => 'N de revision/No revision',
            'author' => 'Autor/Author', 'language' => 'Idioma/Lenguage', 'year' => 'Año de publicacion/Year of publication'];
        $data = array();
        foreach (array_keys($values) as $key) {
            if (array_key_exists($key, $specialAttributes)) {
                $data[$names[$key]] = $tool[$specialAttributes[$key]]->name ?? '';
            } else if(array_key_exists($key, $names)){
                $data[$names[$key]] = $values[$key];
            }
        }
        return $data;
    }

    public function showTool(Tool $tool): array {
        return [
            'id' => $tool->id,
            'item' => $tool->item,
            'docum' => $tool->docum,
            'tech' => $tool->tech,
            'type' => $tool->type,
            'area' => $tool->area,
            'owner' => $tool->owner,
            'available' => $tool->available,
            'code' => $tool->code,
            'description' => $tool->description,
            'revision' => $tool->revision,
            'author' => $tool->author,
            'language' => $tool->language,
            'year' => $tool->year
        ];
    }

    public function search(Request $request) {
        $especialKeys = ['docum','tech','type','area','owner','user'];
        $filters = $request->keys();
        $query = Tool::query();
        foreach($filters as $filter) {
            if (in_array($filter, $especialKeys, true)) {
                $value = is_null($request[$filter]) ? null : $request[$filter]['id'];
                if ($value !== 0) {
                    $query = $query->where("{$filter}_id", is_null($request[$filter]) ? null : $request[$filter]['id']);
                }
            }
            else if (!in_array($filter, $especialKeys, true)){
                $query = $query->where(Str::snake($filter), 'like', "%$request[$filter]%");
            }
        }
        $data = $query->get()->map(function(Tool $tool) {
            return $this->showTool($tool);
        });
        return response()->json($data);
    }

    private function getDocum($data)
    {
        if (is_null($data)) {
            return null;
        }
        if (is_array($data)) {
            return Docum::find($data['id']);
        }
        return Docum::where('name', $data)->firstOrCreate([
            'name' => $data
        ]);
    }

    private function getTech($data)
    {
        if (is_null($data)) {
            return null;
        }
        if (is_array($data)) {
            return Tech::find($data['id']);
        }
        return Tech::where('name', $data)->firstOrCreate([
            'name' => $data
        ]);
    }

    private function getType($data)
    {
        if (is_null($data)) {
            return null;
        }
        if (is_array($data)) {
            return Type::find($data['id']);
        }
        return Type::where('name', $data)->firstOrCreate([
            'name' => $data
        ]);
    }

    private function getArea($data)
    {
        if (is_null($data)) {
            return null;
        }
        if (is_array($data)) {
            return Area::find($data['id']);
        }
        return Area::where('name', $data)->firstOrCreate([
            'name' => $data
        ]);
    }

    private function getOwner($data)
    {
        if (is_null($data)) {
            return null;
        }
        if (is_array($data)) {
            return Owner::find($data['id']);
        }
        return Owner::where('name', $data)->firstOrCreate([
            'name' => $data
        ]);
    }
}

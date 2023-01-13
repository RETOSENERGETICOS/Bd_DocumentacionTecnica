<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(Request $request): JsonResponse {
        return response()->json(
            Area::all()->map( fn(Area $area) => $this->Area($area) )
        );
    }

    private function showArea(Area $area): array {
        return [
            'id' => $area->id,
            'name' => $area->name
        ];
    }
}

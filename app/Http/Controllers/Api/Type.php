<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(Request $request): JsonResponse {
        return response()->json(
            Type::all()->map( fn(Type $type) => $this->showType($type) )
        );
    }

    private function showType(Type $type): array {
        return [
            'id' => $type->id,
            'name' => $type->name
        ];
    }
}

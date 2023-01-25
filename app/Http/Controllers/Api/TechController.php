<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tech;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TechController extends Controller
{
    public function index(Request $request): JsonResponse {
        return response()->json(
            Tech::all()->map( fn(Tech $tech) => $this->showTech($tech) )
        );
    }

    private function showTech(Tech $tech): array {
        return [
            'id' => $tech->id,
            'name' => $tech->name
        ];
    }
}

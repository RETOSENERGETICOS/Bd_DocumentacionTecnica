<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Docum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DocumController extends Controller
{
    public function index(Request $request): JsonResponse {
        return response()->json(
            Docum::all()->map( fn(Docum $docum) => $this->showDocum($docum) )
        );
    }

    private function showDocum(Docum $docum): array {
        return [
            'id' => $docum->id,
            'name' => $docum->name
        ];
    }
}

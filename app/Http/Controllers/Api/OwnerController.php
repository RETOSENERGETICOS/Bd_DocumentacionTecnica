<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index(Request $request): JsonResponse {
        return response()->json(
            Owner::all()->map( fn(Owner $owner) => $this->Owner($owner) )
        );
    }

    private function showOwner(Owner $owner): array {
        return [
            'id' => $owner->id,
            'name' => $owner->name
        ];
    }
}

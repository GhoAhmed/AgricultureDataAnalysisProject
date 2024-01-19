<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pool;

class PoolController extends Controller
{
    public function index()
    {
        try {
            $pools = Pool::all();
            return response()->json(['pools' => $pools]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching pools.'], 500);
        }
    }

    public function show($id)
    {
        $pool = Pool::find($id);

        if (!$pool) {
            return response()->json(['error' => 'Pool not found'], 404);
        }

        return response()->json(['pool' => $pool]);
    }

    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|max:255',
            'water_level' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new pool
        $pool = Pool::create($request->all());

        return response()->json(['pool' => $pool], 201);
    }

    public function update(Request $request, $id)
    {
        $pool = Pool::find($id);

        if (!$pool) {
            return response()->json(['error' => 'Pool not found'], 404);
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|max:255',
            'water_level' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update the pool
        $pool->update($request->all());

        return response()->json(['pool' => $pool]);
    }

    public function destroy($id)
    {
        $pool = Pool::find($id);

        if (!$pool) {
            return response()->json(['error' => 'Pool not found'], 404);
        }

        // Delete the pool
        $pool->delete();

        return response()->json(['message' => 'Pool deleted']);
    }
}

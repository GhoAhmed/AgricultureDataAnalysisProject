<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Engine;

class EngineController extends Controller
{
    public function index()
    {
        try {
            $engines = Engine::all();
            return response()->json(['engines' => $engines]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching engines.'], 500);
        }
    }

    public function show($id)
    {
        $engine = Engine::find($id);

        if (!$engine) {
            return response()->json(['error' => 'Engine not found'], 404);
        }

        return response()->json(['engine' => $engine]);
    }

    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new engine
        $engine = Engine::create($request->all());

        return response()->json(['engine' => $engine], 201);
    }

    public function update(Request $request, $id)
    {
        $engine = Engine::find($id);

        if (!$engine) {
            return response()->json(['error' => 'Engine not found'], 404);
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update the engine
        $engine->update($request->all());

        return response()->json(['engine' => $engine]);
    }

    public function destroy($id)
    {
        $engine = Engine::find($id);

        if (!$engine) {
            return response()->json(['error' => 'Engine not found'], 404);
        }

        // Delete the engine
        $engine->delete();

        return response()->json(['message' => 'Engine deleted']);
    }

}

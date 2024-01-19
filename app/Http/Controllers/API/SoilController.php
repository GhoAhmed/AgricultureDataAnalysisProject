<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Soil;

class SoilController extends Controller
{
    public function index()
    {
        try {
            $soils = Soil::all();
            return response()->json(['soils' => $soils]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching soils.'], 500);
        }
    }

    public function show($id)
    {
        $soil = Soil::find($id);

        if (!$soil) {
            return response()->json(['error' => 'Soil not found'], 404);
        }

        return response()->json(['soil' => $soil]);
    }

    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'moisture_level' => 'required|numeric',
            'nutrient_content' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new soil
        $soil = Soil::create($request->all());

        return response()->json(['soil' => $soil], 201);
    }

    public function update(Request $request, $id)
    {
        $soil = Soil::find($id);

        if (!$soil) {
            return response()->json(['error' => 'Soil not found'], 404);
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'moisture_level' => 'required|numeric',
            'nutrient_content' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update the soil
        $soil->update($request->all());

        return response()->json(['soil' => $soil]);
    }

    public function destroy($id)
    {
        $soil = Soil::find($id);

        if (!$soil) {
            return response()->json(['error' => 'Soil not found'], 404);
        }

        // Delete the soil
        $soil->delete();

        return response()->json(['message' => 'Soil deleted']);
    }
}

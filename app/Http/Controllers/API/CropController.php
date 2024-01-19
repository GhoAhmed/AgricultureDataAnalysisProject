<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function index()
    {
        try {
            $crops = Crop::all();
            return response()->json(['crops' => $crops]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching pools.'], 500);
        }
    }

    public function show($id)
    {
        $crop = Crop::find($id);

        if (!$crop) {
            return response()->json(['error' => 'Crop not found'], 404);
        }

        return response()->json(['crop' => $crop]);
    }

    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'yield' => 'required|numeric',
            'planting_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new pool
        $crop = Crop::create($request->all());

        return response()->json(['crop' => $crop], 201);
    }

    public function update(Request $request, $id)
    {
        $crop = Crop::find($id);

        if (!$crop) {
            return response()->json(['error' => 'Crop not found'], 404);
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'yield' => 'required|numeric',
            'planting_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update the crop
        $crop->update($request->all());

        return response()->json(['crop' => $crop]);
    }

    public function destroy($id)
    {
        $crop = Crop::find($id);

        if (!$crop) {
            return response()->json(['error' => 'Crop not found'], 404);
        }

        // Delete the crop
        $crop->delete();

        return response()->json(['message' => 'Crop deleted']);
    }
}

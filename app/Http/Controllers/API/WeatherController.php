<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        try {
            $weathers = Weather::all();
            return response()->json(['weathers' => $weathers]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching weathers.'], 500);
        }
    }

    public function show($id)
    {
        $weather = Weather::find($id);

        if (!$weather) {
            return response()->json(['error' => 'Weather not found'], 404);
        }

        return response()->json(['weather' => $weather]);
    }

    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'precipitation' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new weather
        $weather = Weather::create($request->all());

        return response()->json(['weather' => $weather], 201);
    }

    public function update(Request $request, $id)
    {
        $weather = Weather::find($id);

        if (!$weather) {
            return response()->json(['error' => 'Weather not found'], 404);
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'precipitation' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update the weather
        $weather->update($request->all());

        return response()->json(['weather' => $weather]);
    }

    public function destroy($id)
    {
        $weather = Weather::find($id);

        if (!$weather) {
            return response()->json(['error' => 'Weather not found'], 404);
        }

        // Delete the weather
        $weather->delete();

        return response()->json(['message' => 'Weather deleted']);
    }
}

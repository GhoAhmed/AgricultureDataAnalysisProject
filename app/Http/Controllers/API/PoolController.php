<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pool;

class PoolController extends Controller
{
    public function getPools()
    {
        try {
            $pools = Pool::all();
            return response()->json(['pools' => $pools]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching products.'], 500);
        }
    }
}

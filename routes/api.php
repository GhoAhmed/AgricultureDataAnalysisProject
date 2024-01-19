<?php

use App\Http\Controllers\API\CropController;
use App\Http\Controllers\API\EngineController;
use App\Http\Controllers\API\PoolController;
use App\Http\Controllers\API\SoilController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Auth ENDPOINTS
Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');
Route::middleware('auth:api')->post('/logout', 'API\AuthController@logout');

//GET ENDPOINTS
Route::get('/users', [UserController::class, 'getUsers']);
Route::get('/pools', [PoolController::class, 'getPools']);
Route::get('/weather', [WeatherController::class, 'getWeather']);
Route::get('/engines', [EngineController::class, 'getEngines']);
Route::get('/soil', [SoilController::class, 'getSoil']);
Route::get('/crops', [CropController::class, 'getCrops']);

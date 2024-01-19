<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CropController;
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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);

//POOLS ENDPOINTS
Route::get('/pools', [PoolController::class, 'index']);
Route::get('/pools/{id}', [PoolController::class, 'show']);
Route::post('/pools', [PoolController::class, 'store']);
Route::put('/pools/{id}', [PoolController::class, 'update']);
Route::delete('/pools/{id}', [PoolController::class, 'destroy']);

//ENGINES ENDPOINTS
Route::get('/engines', [EngineController::class, 'index']);
Route::get('/engines/{id}', [EngineController::class, 'show']);
Route::post('/engines', [EngineController::class, 'store']);
Route::put('/engines/{id}', [EngineController::class, 'update']);
Route::delete('/engines/{id}', [EngineController::class, 'destroy']);

//WEATHER ENDPOINTS
Route::get('/weather', [WeatherController::class, 'index']);
Route::get('/weather/{id}', [WeatherController::class, 'show']);
Route::post('/weather', [WeatherController::class, 'store']);
Route::put('/weather/{id}', [WeatherController::class, 'update']);
Route::delete('/weather/{id}', [WeatherController::class, 'destroy']);

//SOIL ENDPOINTS
Route::get('/soil', [SoilController::class, 'index']);
Route::get('/soil/{id}', [SoilController::class, 'show']);
Route::post('/soil', [SoilController::class, 'store']);
Route::put('/soil/{id}', [SoilController::class, 'update']);
Route::delete('/soil/{id}', [SoilController::class, 'destroy']);

//CROPS ENDPOINTS
Route::get('/crops', [CropController::class, 'index']);
Route::get('/crops/{id}', [CropController::class, 'show']);
Route::post('/crops', [CropController::class, 'store']);
Route::put('/crops/{id}', [CropController::class, 'update']);
Route::delete('/crops/{id}', [CropController::class, 'destroy']);

//USERS ENDPOINTS
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

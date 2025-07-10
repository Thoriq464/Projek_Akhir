<?php

use App\Http\Controllers\Api\KosakataApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DialogflowController;

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

Route::get('/kosakata', [KosakataApiController::class, 'index']);
Route::get('/kosakata/{id}', [KosakataApiController::class, 'show']);

// Import Kosakata dari CSV
Route::post('/kosakata/import', [\App\Http\Controllers\Api\KosakataApiController::class, 'importCsv']);

// Dialogflow
Route::post('/chatbot', [DialogflowController::class, 'handleFlutterRequest']);


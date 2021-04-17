<?php

use App\Models\Jornada;
use App\Http\Controllers\JornadaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* 
Route::get('/Jornada', [JornadaController::class, 'index']);
Route::post('/Jornada', [JornadaController::class, 'store']);
Route::put('/Jornada/{jornada}', [JornadaController::class, 'update']);
Route::delete('/Jornada/{jornada}', [JornadaController::class, 'destroy']);
*/

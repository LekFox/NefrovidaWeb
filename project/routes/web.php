<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JornadaController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\NotasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('jornada',JornadaController::class)->middleware('auth');
Route::resource('beneficiario',BeneficiarioController::class)->middleware('auth');
Route::resource('notas',NotasController::class)->middleware('auth');



Auth::routes(['reset'=>false]); //['register'=>false,'reset'=>false]

Route::get('/home', function () {
    return view('home');
});

Route::group(['middleware' => 'auth'],  function () {
    return view('/home');
    //Route::get('/', [JornadaController::class, 'index'])->name('home');
});

Route::post('/jornadas/search', ['as' => 'search-jornadas', 'uses' => 'App\Http\Controllers\JornadaController@searchJornadas']);
Route::post('/jornadas/searchloc', ['as' => 'search-jornadas-loc', 'uses' => 'App\Http\Controllers\JornadaController@searchJornadasLoc']);


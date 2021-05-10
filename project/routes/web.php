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
    return view('home');
})->middleware('auth');

Route::resource('jornada',JornadaController::class)->middleware('auth');
Route::resource('beneficiario',BeneficiarioController::class)->middleware('auth');
Route::resource('notas',NotasController::class)->middleware('auth');



Auth::routes(['reset'=>false]); //['register'=>false,'reset'=>false]

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::group(['middleware' => 'auth'],  function () {
    return view('/home');
    //Route::get('/', [JornadaController::class, 'index'])->name('home');
});

Route::post('/jornadas/search', ['as' => 'search-jornadas', 'uses' => 'App\Http\Controllers\JornadaController@searchJornadas']);
Route::post('/jornadas/searchloc', ['as' => 'search-jornadas-loc', 'uses' => 'App\Http\Controllers\JornadaController@searchJornadasLoc']);

Route::post('/beneficiarios/search', ['as' => 'search-beneficiarios', 'uses' => 'App\Http\Controllers\BeneficiarioController@searchBeneficiarios']);
Route::post('/beneficiarios/searchage', ['as' => 'search-beneficiarios-age', 'uses' => 'App\Http\Controllers\BeneficiarioController@searchBeneficiariosAge']);

Route::get('/usuarios',[App\Http\Controllers\registrarUsuariosController::class,'index'])->name('registrarUsuario');

//Route::get('/usuarios','App\Http\Controllers\registrarUsuariosController@index');
//Route::post('/usuarios','App\Http\Controllers\RegistrarUsuarios@store');

// Route::post('beneficiario/fetch', 'BeneficiarioController@fetch')->name('beneficiario.fetch');


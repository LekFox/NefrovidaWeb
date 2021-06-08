<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JornadaController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\TamizajeController;
use App\Http\Controllers\AnalisisLabController;
use App\Http\Controllers\ExamenOrinaController;
use App\Http\Controllers\evaluacionController;
use App\Http\Controllers\QuimicaSanguineaController;
use App\Http\Controllers\microController;
use App\Http\Controllers\DepuracionCreatininaController;
use App\Http\Controllers\evaluacionFinalController;
use App\Http\Controllers\NutricionConsultaController;

use App\Http\Controllers\consultaController;
use App\Http\Controllers\nefropediatriaController;
use App\Http\Controllers\RiesgosController;
use App\Http\Controllers\evidenciaController;
use App\Http\Controllers\EvaluacionInicialController;



use Illuminate\Support\Facades\Auth;
use App\Models\User;






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
// Route::resource('notas',NotasController::class)->middleware('auth');
Route::resource('beneficiario.antecedentes', AntecedenteController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.tamizaje', TamizajeController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.analisislab', AnalisisLabController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.examenorina', ExamenOrinaController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.quimicasanguinea', QuimicaSanguineaController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.micro', microController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.depuracioncreatinina', DepuracionCreatininaController::class)->shallow()->middleware('auth');

//Route::resource('nutricion',NutricionConsultaController::class)->middleware('auth');
Route::resource('beneficiario.nutricion',NutricionConsultaController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.notas',NotasController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.consulta',consultaController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.evidencia',evidenciaController::class)->shallow()->middleware('auth');
Route::resource('beneficiario.nefropediatria',nefropediatriaController::class)->shallow()->middleware('auth');




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
Route::get('/jornada/{jornada}/anadirBeneficiario', [JornadaController::class, 'anadirBeneficiario'])->name('anadirBeneficiario');
Route::post('/jornada/asignarBeneficiario', [JornadaController::class, 'asignarBeneficiario']);
Route::get('/jornada/{jornada}/anadirNuevoBeneficiario', [JornadaController::class, 'anadirNuevoBeneficiario'])->name('anadirNuevoBeneficiario');
Route::post('/jornada/asignarNuevoBeneficiario', [JornadaController::class, 'asignarNuevoBeneficiario']);

Route::post('/beneficiarios/search', ['as' => 'search-beneficiarios', 'uses' => 'App\Http\Controllers\BeneficiarioController@searchBeneficiarios']);
Route::post('/beneficiarios/searchage', ['as' => 'search-beneficiarios-age', 'uses' => 'App\Http\Controllers\BeneficiarioController@searchBeneficiariosAge']);


//Route::get('/usuarios',[App\Http\Controllers\registrarUsuariosController::class,'index'])->name('registrarUsuario')->middleware('auth');

Route::get('/beneficiario/{beneficiario}/datos', [BeneficiarioController::class, 'getBeneficiarioData'])->middleware('auth');
//Route::get('/usuarios','App\Http\Controllers\registrarUsuariosController@index');
//Route::post('/usuarios','App\Http\Controllers\RegistrarUsuarios@store');

// Route::post('beneficiario/fetch', 'BeneficiarioController@fetch')->name('beneficiario.fetch');

Route::resource('evaluacionInicial',EvaluacionInicialController::class)->middleware('auth');
Route::resource('beneficiario.evaluacionInicial',EvaluacionInicialController::class)->middleware('auth');

//Route::resource('preguntasEvaluacion',preguntasController::class)->middleware('auth');

//Route::post('/evaluacion/storeFinal', ['uses' => 'App\Http\Controllers\EvaluacionController@storeFinal']);

Route::resource('beneficiario.riesgos',RiesgosController::class)->middleware('auth');
Route::resource('riesgos',RiesgosController::class)->middleware('auth');

Route::resource('evaluacionFinal',EvaluacionFinalController::class)->middleware('auth');
Route::resource('beneficiario.evaluacionFinal',EvaluacionFinalController::class)->middleware('auth');
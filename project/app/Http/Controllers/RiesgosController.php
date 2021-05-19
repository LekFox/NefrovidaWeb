<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Beneficiario;
use App\Models\FactorDeRiesgo;
use App\Models\PreguntaRiesgo;

class RiesgosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pregunta = PreguntaRiesgo::all();

        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());
        return view('factorDeRiesgo.create',$datos);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preguntas = PreguntaRiesgo::find(1)->preguntasRiesgos;

        return view('factorDeRiesgo.create',["preguntas"=>$preguntas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preguntas = PreguntaRiesgo::find(1)->preguntasRiesgos;

        return view('factorDeRiesgo.create',["preguntas"=>$preguntas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

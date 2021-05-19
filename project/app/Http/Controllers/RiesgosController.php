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
        $data = [
            $request->input('inlineRadioOptions1'),
            $request->input('inlineRadioOptions2'),
            $request->input('inlineRadioOptions3'),
            $request->input('inlineRadioOptions4'),
            $request->input('inlineRadioOptions5'),
            $request->input('inlineRadioOptions6'),
            $request->input('inlineRadioOptions7'),
            $request->input('inlineRadioOptions8'),
            $request->input('inlineRadioOptions9'),
            $request->input('inlineRadioOptions10'),
            $request->input('inlineRadioOptions11'),
            $request->input('inlineRadioOptions12'),
            
        ];

        request()->validate([
            'beneficiario_id'=>'required',
        
        ]);

        /*$riesgos = new FactorDeRiesgo([
            'pregunta_id' => request('1'),
            'respuesta' => request('inlineRadioOptions1')
        ]);

        $id = request('beneficiario_id');
        $beneficiario = Beneficiario::find($id);
        $beneficiario->factoresDeRiesgo()->save($riesgos);*/



        $id = request('beneficiario_id');

        $enfermedad = $request->input('enfermedad');

        

        FactorDeRiesgo::saveFactoresDeRiesgo($id, $data, $enfermedad);


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

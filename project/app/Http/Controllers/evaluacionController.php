<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluacion;
use Illuminate\Support\Facades\Http;


class evaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $evaluacion = Evaluacion::all();

       return view('');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
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
            $request->input('inlineRadioOptions9')

        ];



        Evaluacion::saveEvaluacionInicial($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preguntas = Evaluacion::find($id)->preguntasEvaluacion;
        return view('evaluacion.create',["preguntas"=>$preguntas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preguntas =  Evaluacion::getPreguntas($id);

        $evaluacion = Evaluacion::find($id);

        return view('evaluacion.edit',['preguntas' => $preguntas], ['evaluacion' => $evaluacion]);
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
      
        return redirect('beneficiario/'.$id)->with('editado','Preguntas de evaluación actualizada con éxito!');

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

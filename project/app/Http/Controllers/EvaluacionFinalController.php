<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Beneficiario;
use App\Models\EvaluacionFinal;

class EvaluacionFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $beneficiario=Beneficiario::findOrFail($id);
        return view('evaluacionFinal.create', compact('beneficiario'));
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

        request()->validate([
            'beneficiario_id'=>'required',
            
        
        ]);

        $id = request('beneficiario_id');

        $edad = $request->input('edad');

        $grado = $request->input('grado');

        $grupo = $request->input('grupo');

        $sexo = $request->input('sexo');

        EvaluacionFinal::saveEvaluacionFinal($id, $edad, $grado, $grupo, $sexo, $data);

        $id = request('beneficiario_id');

        return redirect('beneficiario/'.$id)->with('nuevo','Evaluación Final registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluacionFinal = EvaluacionFinal::where('beneficiario_id',$id)->get();

        $beneficiario = Beneficiario::FindOrFail($id);

        return view('evaluacionFinal.show',['evaluacionFinal'=>$evaluacionFinal, 'beneficiario'=>$beneficiario]);
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
        $evaluacionFinal = EvaluacionFinal::where('beneficiario_id', $id);
        
        $success = $evaluacionFinal->delete();

        return redirect('beneficiario/'.$id)->with('eliminado','Evaluación Final eliminada exitosamente');
    }
}

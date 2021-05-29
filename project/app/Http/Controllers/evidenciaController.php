<?php

namespace App\Http\Controllers;

use App\Models\evidencia;
use Illuminate\Http\Request;

class evidenciaController extends Controller
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
        return view('evidencia.create',compact('beneficiario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'beneficiario_id' => 'required',
        ]);

        $evidencia= new evidencia([
            'padecimiento'=> request('padecimiento'),
            'brazoD'=> request('brazoD'),
            'brazoI'=> request('brazoI'),
            'fCardiaca'=> request('fCardiaca'),
            'fRespiratoria'=> request('fRespiratoria'),
            'temperatura'=> request('temperatura'),
            'peso'=> request('peso'),
            'talla'=> request('talla'),
            'cabeza'=> request('cabeza'),
            'torax'=> request('torax'),
            'abdomen'=> request('abdomen'),
            'extremidades'=> request('extremidades'),
            'mental'=> request('mental'),
            'observaciones'=> request('observaciones'),
            'diagnostico'=> request('diagnostico'),
            'tratamiento'=> request('tratamiento'),
        ]);

         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->evidencia()->save($evidencia);

        return redirect('beneficiario/'.$id)->with('nuevo','EEvidencia Registrada Exitósamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evidencia=evidencia::findOrFail($id);
        return view('evidencia.show',compact('evidencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\evidencia  $evidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(evidencia $evidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\evidencia  $evidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, evidencia $evidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\evidencia  $evidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(evidencia $evidencia)
    {
        //
    }
}

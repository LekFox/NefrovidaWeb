<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\consulta;

class consulta extends Controller
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
        return view('consulta.create',compact('beneficiario'));
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

        $consulta= new consulta([
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
         $beneficiario->consulta()->save($consulta);

        return redirect('beneficiario/'.$id)->with('nuevo','Consulta Agregada Exitosamente');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta=consulta::findOrFail($id);
        return view('consulta.show',compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta=consulta::findOrFail($id);
        return view('consulta.edit',compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consulta=consulta::findOrFail($id);
        
        $id=$consulta->beneficiario_id;
        $success = $consulta->update([
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
        return redirect('beneficiario/'.$id)->with('editado','Cambios Realizados Exitósamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = consulta::find($id);
        $id=$consulta->beneficiario_id;
        $success = $consulta->delete();

        return redirect('beneficiario/'.$id)->with('nuevo','Consulta Borrada Exitósamente');
    }

}

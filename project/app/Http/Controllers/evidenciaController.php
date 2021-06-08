<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;

use App\Models\Beneficiario;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\evidencia;

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

        $evidencia = new evidencia();
        
        $file = $request->file;
        $filename = time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $evidencia->file=$filename;

        $evidencia->fecha=$request->fecha;
        $evidencia->nombre=$request->nombre;
        $evidencia->descripcion=$request->descripcion;

        $id = request('beneficiario_id');
        $beneficiario = Beneficiario::find($id);
        $beneficiario->notas()->save($evidencia);

        return redirect('beneficiario/'.$id)->with('nuevo','Evidencia Registrada Exitósamente');
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
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evidencia=evidencia::findOrFail($id);
        return view('evidencia.edit',compact('evidencia'));
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
        request()->validate([
            'beneficiario_id' => 'required',
        ]);

        $evidencia = new evidencia();
        
        $file = $file;
        /*$filename = time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $evidencia->file=$filename;*/

        $evidencia->nombre=$request->nombre;
        $evidencia->descripcion=$request->descripcion;

        $id = request('beneficiario_id');
        $beneficiario = Beneficiario::find($id);
        $beneficiario->notas()->save($evidencia);

        return redirect('beneficiario/'.$id)->with('nuevo','Evidencia Registrada Exitósamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evidencia = evidencia::find($id);
        $id=$evidencia->beneficiario_id;
        $success = $evidencia->delete();

        return redirect('beneficiario/'.$id)->with('nuevo','Evidencia Borrada Exitósamente');
    }
}

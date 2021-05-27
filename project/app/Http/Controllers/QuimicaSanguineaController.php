<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\QuimicaSanguinea;

class QuimicaSanguineaController extends Controller
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
        return view('quimicasanguinea.create',compact('beneficiario'));
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
            'Glucosa' => 'numeric|gte:0|nullable',
            'Urea' => 'numeric|gte:0|nullable',
            'Bun' => 'numeric|gte:0|nullable',
            'Creatina' => 'numeric|gte:0|nullable',
            'acidoUrico' => 'numeric|gte:0|nullable',
            'colesterolTotal' => 'numeric|gte:0|nullable',
            'trigliceridos' => 'numeric|gte:0|nullable',
            'Metodo' => 'nullable',
            'nota' => 'nullable',
        ]);


        $quimSang = QuimicaSanguinea::create([
            'beneficiario_id' => request('beneficiario_id'),
            'glucosa' => request('Glucosa'),
            'urea'=> request('Urea'),
            'bun'=> request('Bun'),
            'creatina'=> request('Creatina'),
            'acidoUrico' => request('acidoUrico'),
            'colesterolTotal' => request('colesterolTotal'),
            'trigliceridos' => request('trigliceridos'),
            'nota'=> request('Metodo'),
            'metodo'=> request('nota'),
        ]);

    $id = request('beneficiario_id');
    return redirect('beneficiario/'.$id)->with('nuevo','Química sanguinea registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $quimicasanguinea=QuimicaSanguinea::findOrFail($id);
        return view('quimicasanguinea.show',compact('quimicasanguinea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quimicasanguinea=QuimicaSanguinea::findOrFail($id);
        return view('quimicasanguinea.create',compact('quimicasanguinea'));
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
        request()->validate([
            'quimicasanguinea_id' => 'required',
            'Glucosa' => 'numeric|gte:0|nullable',
            'Urea' => 'numeric|gte:0|nullable',
            'Bun' => 'numeric|gte:0|nullable',
            'Creatina' => 'numeric|gte:0|nullable',
            'acidoUrico' => 'numeric|gte:0|nullable',
            'colesterolTotal' => 'numeric|gte:0|nullable',
            'trigliceridos' => 'numeric|gte:0|nullable',
            'Metodo' => 'nullable',
            'nota' => 'nullable',
        ]);

            $quimicasanguinea = QuimicaSanguinea::findOrFail($id);
            $success = $quimicasanguinea->update([
            'glucosa' => request('Glucosa'),
            'urea'=> request('Urea'),
            'bun'=> request('Bun'),
            'creatina'=> request('Creatina'),
            'acidoUrico' => request('acidoUrico'),
            'colesterolTotal' => request('colesterolTotal'),
            'trigliceridos' => request('trigliceridos'),
            'nota'=> request('Metodo'),
            'metodo'=> request('nota'),
        ]);

        return redirect('quimicasanguinea/'.$id)->with('editado','Cambios realizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $quimicasanguinea=QuimicaSanguinea::findOrFail($id);
        $id_beneficiario = request('id_beneficiario');
        $success = $quimicasanguinea->delete();
        return redirect('beneficiario/'.$id_beneficiario)->with('eliminado','Química sanguinea borrada con éxito');
    }
}

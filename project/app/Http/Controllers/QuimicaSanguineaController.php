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
            'Glucosa' => 'required|numeric|gte:0',
            'Urea' => 'required|numeric|gte:0',
            'Bun' => 'required|numeric|gte:0',
            'Creatina' => 'required|numeric|gte:0',
            'acidoUrico' => 'required|numeric|gte:0',
            'colesterolTotal' => 'required|numeric|gte:0',
            'trigliceridos' => 'required|numeric|gte:0',
            'Metodo' => 'required',
            'nota' => 'required',
        ]);


        $quimSang = QuimicaSanguinea::create([
            'beneficiario_id' => request('beneficiario_id'),
            'glucosa' => request('Glucosa|gt'),
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
        //
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

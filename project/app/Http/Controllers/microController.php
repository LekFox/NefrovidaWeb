<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\micro;

class microController extends Controller
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
        return view('micro.create',compact('beneficiario'));
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
            'microalbumina' => 'required|numeric|gte:0',
            'creatinina' => 'required|numeric|gte:0',
            'microalbuminaCreatinina' => 'required|numeric|gte:0',
            'metodo' => 'required',
        ]);

        $micro = micro::create([
            'beneficiario_id' => request('beneficiario_id'),
            'microalbumina' => request('microalbumina'),
            'creatinina'=> request('creatinina'),
            'microalbuminaCreatinina' => request('microalbuminaCreatinina'),
            'metodo' => request('metodo'),
            'nota'=> request('nota'),
        ]);

        $id = request('beneficiario_id');
        return redirect('beneficiario/'.$id)->with('nuevo','Laboratorio Microalbuminuría Registrado Exitósamente.');
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

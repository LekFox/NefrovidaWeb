<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\DepuracionCreatinina;

class DepuracionCreatininaController extends Controller
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
        return view('depuracioncreatinina.create',compact('beneficiario'));
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
            'talla' => 'numeric|gte:0|required',
            'peso' => 'numeric|gte:0|required',
            'volumen' => 'numeric|gte:0|required',
            'superficieCorporal' => 'numeric|gte:0|nullable',
            'creatininaSuero' => 'numeric|gte:0|nullable',
            'creatininaDepuracion' => 'numeric|gte:0|nullable',
            'Metodo' => 'nullable',
            'nota' => 'nullable',
        ]);


        $depCreatinina = DepuracionCreatinina::create([
            'beneficiario_id' => request('beneficiario_id'),
            'talla' => request('talla'),
            'peso'=> request('peso'),
            'volumen'=> request('volumen'),
            'superficieCorporal'=> request('superficieCorporal'),
            'creatininaSuero' => request('creatininaSuero'),
            'creatininaDepuracion' => request('creatininaDepuracion'),
            'nota'=> request('Metodo'),
            'metodo'=> request('nota'),
        ]);
    
    $id = request('beneficiario_id');
    return redirect('beneficiario/'.$id)->with('nuevo','Depuración de Creatinina en Orina de 24 Hrs registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $depuracioncreatinina=DepuracionCreatinina::findOrFail($id);
        return view('depuracioncreatinina.show',compact('depuracioncreatinina'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use Illuminate\Http\Request;
use App\Http\Resources\Notas as NotasResource;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Beneficiario;




class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['Notas']=NotasResource::collection(Notas::all());
        return view('notas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$beneficiario_id=auth()->beneficiario()->id();
        // $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());
        // $beneficiario_id =  $datos->id();
        // $request['beneficiario_id'] = $beneficiario_id;
        //$beneficiario_id=Beneficiario::
        request()->validate([
            'fecha' => 'required',
            'comentario' => 'required',
        ]);
    
        // $status = Beneficiario::where(['name'=>'sample_status'])->firstOrFail();
        // $order->order_status_id = $status->id;
        // $order->save();
        // Notas::create($request->all());
        // Notas::create([
        //     //'beneficiario_id' => request('beneficiario_id'),
        //     'tipoNota_id' => 1,
        //     'fecha' => request('fecha'),
        //     'comentario' => request('comentario'),
        // ]);

        $nota= new Notas([
            'tipoNota_id' => 1,
            'fecha' => request('fecha'),
            'comentario' => request('comentario'),
        ]);

        $beneficiario = Beneficiario::findOrFail($id);
        $beneficiario->notas()->save($nota);

        return redirect('beneficiario')->with('nuevo','Nota agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show(Notas $notas)
    {
        $notas=Notas::findOrFail($id);

        return view('notas.show',compact('notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit(Notas $notas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notas $notas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notas $notas)
    {
        //
    }
}

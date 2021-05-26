<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
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
            //'microalbuminaCreatinina' => 'required|numeric|gte:0',
            'metodo' => 'required',
        ]);

        $microalbumina = floatval(request('microalbumina'));
        $creatinina = floatval(request('creatinina'));
        if($creatinina != null){
            $microalbuminaCreatinina = ($microalbumina*100)/$creatinina;
            $microalbuminaCreatinina = round($microalbuminaCreatinina,2);
        }
        else{
            $microalbuminaCreatinina = null;
        }

        $micro = new micro([
            'microalbumina' => request('microalbumina'),
            'creatinina'=> request('creatinina'),
            'microalbuminaCreatinina' => request('microalbuminaCreatinina'),
            'metodo' => request('metodo'),
            'nota'=> request('nota'),
        ]);

        $id = request('beneficiario_id');
        $beneficiario = Beneficiario::find($id);
        $beneficiario->micro()->save($micro);
        return redirect('beneficiario/'.$id)->with('nuevo','Laboratorio Microalbuminuría Registrado Exitósamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $micro=micro::findOrFail($id);
        return view('micro.show',compact('micro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $micro=micro::findOrFail($id);
        return view('micro.edit',compact('micro'));
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
        $micro=micro::findOrFail($id);
        
        $id=$micro->beneficiario_id;
        $success = $consulta->update([
            'microalbumina' => request('microalbumina'),
            'creatinina'=> request('creatinina'),
            'microalbuminaCreatinina' => request('microalbuminaCreatinina'),
            'metodo' => request('metodo'),
            'nota'=> request('nota'),
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
        $micro = micro::find($id);
        $id=$micro->beneficiario_id;
        $success = $micro->delete();

        return redirect('beneficiario/'.$id)->with('nuevo','Laboratorio Microalbuminuría Borrado Exitósamente');
    }

}















 




 



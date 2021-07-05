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
            'creatininaOrina' => 'numeric|gte:0|required',
            'creatininaSuero' => 'numeric|gt:0|required',
            'creatininaDepuracion' => 'numeric|gte:0|nullable',
            'Metodo' => 'nullable',
            'nota' => 'nullable',
            'fecharegistro' => 'required',
        ]);
        
        $superCorp = request('superficieCorporal');
        $creatiDepuracion = request('creatininaDepuracion');

        if (request('superficieCorporal') == null) {
            $talla = request('talla');
            $peso = request('peso');
            $superCorp = ($talla+$peso-60)/100;
        }

        if (request('creatininaDepuracion') == null) {
            $creatiOrina = request('creatininaOrina');
            $creatiSuero = request('creatininaSuero');
            $volumen = request('volumen');
            $creatiDepuracion = ($creatiOrina*$volumen*1.73)/($creatiSuero*1440*$superCorp);
        }

        $depCreatinina = DepuracionCreatinina::create([
            'beneficiario_id' => request('beneficiario_id'),
            'talla' => request('talla'),
            'peso'=> request('peso'),
            'volumen'=> request('volumen'),
            'superficieCorporal'=> $superCorp,
            'creatininaSuero' => request('creatininaSuero'),
            'creatininaDepuracion' => $creatiDepuracion,
            'nota'=> request('nota'),
            'metodo'=> request('Metodo'),
            'creatininaOrina' => request('creatininaOrina'),
            'fecharegistro' => request('fecharegistro'),
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
        $depuracioncreatinina=DepuracionCreatinina::findOrFail($id);
        return view('depuracioncreatinina.create',compact('depuracioncreatinina'));    }

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
            'depuracioncreatinina_id' => 'required',
            'talla' => 'numeric|gte:0|required',
            'peso' => 'numeric|gte:0|required',
            'volumen' => 'numeric|gte:0|required',
            'superficieCorporal' => 'numeric|gte:0|nullable',
            'creatininaOrina' => 'numeric|gte:0|required',
            'creatininaSuero' => 'numeric|gt:0|required',
            'creatininaDepuracion' => 'numeric|gte:0|nullable',
            'Metodo' => 'nullable',
            'nota' => 'nullable',
            'fecharegistro' => 'required',
        ]);    
        
        //$superCorp = request('superficieCorporal');
        //$creatiDepuracion = request('creatininaDepuracion');

        $talla = request('talla');
        $peso = request('peso');
        $superCorp = ($talla+$peso-60)/100;

        $creatiOrina = request('creatininaOrina');
        $creatiSuero = request('creatininaSuero');
        $volumen = request('volumen');
        $creatiDepuracion = ($creatiOrina*$volumen*1.73)/($creatiSuero*1440*$superCorp);

        $depuracioncreatinina=DepuracionCreatinina::findOrFail($id);
        $success = $depuracioncreatinina->update([
            'talla' => request('talla'),
            'peso'=> request('peso'),
            'volumen'=> request('volumen'),
            'superficieCorporal'=> $superCorp,
            'creatininaSuero' => request('creatininaSuero'),
            'creatininaDepuracion' => $creatiDepuracion,
            'nota'=> request('nota'),
            'metodo'=> request('Metodo'),
            'creatininaOrina' => request('creatininaOrina'),
            'fecharegistro' => request('fecharegistro'),
        ]);

        return redirect('depuracioncreatinina/'.$id)->with('editado','Cambios realizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $depuracioncreatinina=DepuracionCreatinina::findOrFail($id);
        $id_beneficiario = request('id_beneficiario');
        $success = $depuracioncreatinina->delete();
        return redirect('beneficiario/'.$id_beneficiario)->with('eliminado','Depuración de creatinina en orina de 24 h borrada con éxito');
    }
}

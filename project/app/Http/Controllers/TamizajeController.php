<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Beneficiario;
use App\Models\Tamizaje;

class TamizajeController extends Controller
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
        return view('tamizaje.create',compact('beneficiario'));
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
            'sistolica' => 'required',
            'diastolica' => 'required',
            'circunferenciaCintura' => 'required',
            'circunferenciaCadera' => 'required',
            'glucosaCapilar' => 'required',
            'talla' => 'required',
            'peso' => 'required',
        ]);
        $cintura = floatval(request('circunferenciaCintura'));
        $cadera = floatval(request('circunferenciaCadera'));
        $indiceCinturaCadera = $cintura/$cadera;

        $tamizaje= new Tamizaje([
            'sistolica' => request('sistolica'),
            'diastolica' => request('diastolica'),
            'circunferenciaCintura' => request('circunferenciaCintura'),
            'circunferenciaCadera' => request('circunferenciaCadera'),
            'glucosaCapilar' => request('glucosaCapilar'),
            'talla' => request('talla'),
            'peso' => request('peso'),
            'comentario' => request('comentario'),
            'indiceCinturaCadera' => $indiceCinturaCadera,
        ]);

         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->tamizaje()->save($tamizaje);

        return redirect('beneficiario/'.$id)->with('nuevo','Tamizaje registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tamizaje=Tamizaje::findOrFail($id);
        return view('tamizaje.show',compact('tamizaje'));
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

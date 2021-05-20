<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Beneficiario;
use App\Models\consulta;


class consultaController extends Controller
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
            'padecimiento' => 'required',
            'fCardiaca' => 'required',
            'temperatura' => 'required',
            'diagnostico' => 'required',
            'tratamiento' => 'required',
        ]);
        $consulta= new consulta([
            'padecimiento' => request('padecimiento'),
            'brazoD' => request('brazoD'),
            'brazoI' => request('brazoI'),
            'fCardiaca' => request('fCardiaca'),
            'fRespiratoria' => request('fRespiratoria'),
            'temperatura' => request('temperatura'),
            'peso' => request('peso'),
            'talla' => request('talla'),
            'cabezaCuello' => request('cabezaCuello'),
            'torax' => request('torax'),
            'abdomen' => request('abdomen'),
            'extremidades' => request('extremidades'),
            'mental' => request('mental'),
            'observaciones' => request('observaciones'),
            'diagnostico' => request('diagnostico'),
            'tratamiento' => request('tratamiento'),
            //'beneficiario_id' => request('beneficiario_id'),
        ]);

         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->consulta()->save($consulta);

        return redirect('beneficiario/'.$id)->with('nuevo','Consulta Registrada Exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'padecimiento' => 'required',
            'fCardiaca' => 'required',
            'temperatura' => 'required',
            'diagnostico' => 'required',
            'tratamiento' => 'required',
        ]);

        $consulta=consulta::findOrFail($id);
        
        $success = $consulta->update([
            'padecimiento' => request('padecimiento'),
            'brazoD' => request('brazoD'),
            'brazoI' => request('brazoI'),
            'fCardiaca' => request('fCardiaca'),
            'fRespiratoria' => request('fRespiratoria'),
            'temperatura' => request('temperatura'),
            'peso' => request('peso'),
            'talla' => request('talla'),
            'cabezaCuello' => request('cabezaCuello'),
            'torax' => request('torax'),
            'abdomen' => request('abdomen'),
            'extremidades' => request('extremidades'),
            'mental' => request('mental'),
            'observaciones' => request('observaciones'),
            'diagnostico' => request('diagnostico'),
            'tratamiento' => request('tratamiento'),
        ]);
    }



        return redirect('consulta/'.$id)->with('editado','Cambios Realizados Exitósamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $consulta=consulta::findOrFail($id);
        $id_beneficiario = request('id_beneficiario');
        $success = $consulta->delete();
        return redirect('beneficiario/'.$id_beneficiario)->with('eliminado','Consulta Borrada Exitosamente!');
    }
}
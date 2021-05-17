<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Http\Resources\Consulta as ConsultaResource;
use App\Models\Beneficiario;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());

        return view('consulta.create',$datos);
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
            'TAbrazoDerecho'=> 'required',
            'TAbrazoIzquierdo'=> 'required',
            'frecuenciaCardiaca'=> 'required',
            'frecuenciaRespiratoria'=> 'required',
            'temperatura'=> 'required',
            'peso'=> 'required',
            'talla'=> 'required',
            'cabezaCuello'=> 'required',
            'torax'=> 'required',
            'abdomen'=> 'required',
            'extremidades'=> 'required',
            'estadoMentalNeurologico'=> 'required',
            'observaciones'=> 'required',
            'diagnostico'=> 'required',
            'tratamiento'=> 'required',

        ]);
    

        $consulta = new Consulta([
            'padecimiento' => request('padecimiento'),
            'TAbrazoDerecho' => request('TAbrazoDerecho'),
            'TAbrazoIzquierdo' => request('TAbrazoIzquierdo'),
            'frecuenciaCardiaca' => request('frecuenciaCardiaca'),
            'frecuenciaRespiratoria' => request('frecuenciaRespiratoria'),
            'temperatura' => request('temperatura'),
            'peso' => request('peso'),
            'talla' => request('talla'),
            'cabezaCuello' => request('cabezaCuello'),
            'torax' => request('torax'),
            'abdomen' => request('abdomen'),
            'extremidades' => request('extremidades'),
            'estadoMentalNeurologico' => request('estadoMentalNeurologico'),
            'observaciones' => request('observaciones'),
            'diagnostico' => request('diagnostico'),
            'tratamiento' => request('tratamiento'),

        ]);

         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->consulta()->save($consulta);

        return redirect('beneficiario/'.$id)->with('nuevo','Consulta Agregada Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta=Consulta::findOrFail($id);

        return view('consulta.show',compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta=Consulta::findOrFail($id);

        return view('consulta.edit',compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $consulta = Consulta::find($id);
        request()->validate([
            'padecimiento'=> 'required',
            'TAbrazoDerecho'=> 'required',
            'TAbrazoIzquierdo'=> 'required',
            'frecuenciaCardiaca'=> 'required',
            'frecuenciaRespiratoria'=> 'required',
            'temperatura'=> 'required',
            'peso'=> 'required',
            'talla'=> 'required',
            'cabezaCuello'=> 'required',
            'torax'=> 'required',
            'abdomen'=> 'required',
            'extremidades'=> 'required',
            'estadoMentalNeurologico'=> 'required',
            'observaciones'=> 'required',
            'diagnostico'=> 'required',
            'tratamiento'=> 'required',
        ]);

        $id=$consulta->beneficiario_id;

        $success = $consulta->update([
            'padecimiento' => request('padecimiento'),
            'TAbrazoDerecho' => request('TAbrazoDerecho'),
            'TAbrazoIzquierdo' => request('TAbrazoIzquierdo'),
            'frecuenciaCardiaca' => request('frecuenciaCardiaca'),
            'frecuenciaRespiratoria' => request('frecuenciaRespiratoria'),
            'temperatura' => request('temperatura'),
            'peso' => request('peso'),
            'talla' => request('talla'),
            'cabezaCuello' => request('cabezaCuello'),
            'torax' => request('torax'),
            'abdomen' => request('abdomen'),
            'extremidades' => request('extremidades'),
            'estadoMentalNeurologico' => request('estadoMentalNeurologico'),
            'observaciones' => request('observaciones'),
            'diagnostico' => request('diagnostico'),
            'tratamiento' => request('tratamiento'),
        ]);

        return redirect('beneficiario/'.$id)->with('editado','Cambios Realizados Éxitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id);
        $id=$consulta->beneficiario_id;
        $success = $consulta->delete();

        return redirect('beneficiario/'.$id)->with('nuevo','Consulta Borrada Exitosamente');
    }
}
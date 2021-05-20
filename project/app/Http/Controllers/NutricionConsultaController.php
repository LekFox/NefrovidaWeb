<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\nutricionConsulta;


class NutricionConsultaController extends Controller
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
    public function create($id)
    {

        // $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());
        // return view('nutriologia.create',$datos);
        $beneficiario=Beneficiario::findOrFail($id);
        return view('nutriologia.create',compact('beneficiario'));
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
        ]);

        $consulta= new nutricionConsulta([
            'ocupacion'=> request('ocupacion'),
            'horarioscomida'=> request('horarioscomida'),
            'cantidadalimentos'=> request('cantidadalimentos'),
            'apetito'=> request('apetito'),
            'distension'=> request('distension'),
            'estrenimiento'=> request('estrenimiento'),
            'flatulencias'=> request('flatulencias'),
            'vomitos'=> request('vomitos'),
            'caries'=> request('caries'),
            'edema'=> request('edema'),
            'mareo'=> request('mareo'),
            'zumbido'=> request('zumbido'),
            'cefaleas'=> request('cefaleas'),
            'disnea'=> request('disnea'),
            'poliuria'=> request('poliuria'),
            'actividadfisica'=> request('actividadfisica'),
            'suenohoras'=> request('suenohoras'),
            'comidasdia'=> request('comidasdia'),
            'lugarcomida'=> request('lugarcomida'),
            'preparacomida'=> request('preparacomida'),
            'entrecomidas'=> request('entrecomidas'),
            'alimentospreferidos'=> request('alimentospreferidos'),
            'alimentosodiados'=> request('alimentosodiados'),
            'suplementos'=> request('suplementos'),
            'medicamentos'=> request('medicamentos'),
            'consumoagua'=> request('consumoagua'),
            'recordatoriodesayuno'=> request('recordatoriodesayuno'),
            'recordatoriocolacionm'=> request('recordatoriocolacionm'),
            'recordatoriocomida'=> request('recordatoriocomida'),
            'recordatoriocolaciont'=> request('recordatoriocolaciont'),
            'recordatoriocena'=> request('recordatoriocena'),
            'peso'=> request('peso'),
            'estatura'=> request('estatura'),
            'tipodieta'=> request('tipodieta'),
            'kilocaloriastotal'=> request('kilocaloriastotal'),
            'kilocaloriashidratos'=> request('kilocaloriashidratos'),
            'porcentajehidratos'=> request('porcentajehidratos'),
            'porcentajeproteinas'=> request('porcentajeproteinas'),
            'porcentajegrasas'=> request('porcentajegrasas'),
            'diagnostico'=> request('diagnostico'),
            'nota'=> request('nota'),
            //'beneficiario_id' => request('beneficiario_id'),
        ]);

         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->nutricionconsulta()->save($consulta);

        return redirect('beneficiario/'.$id)->with('nuevo','Consulta agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta=nutricionConsulta::findOrFail($id);
        return view('nutricion.show',compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta=nutricionConsulta::findOrFail($id);
        //$datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());


        return view('nutricion.edit',compact('consulta'));
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

        // request()->validate([
        //     'beneficiario_id' => 'required',
        // ]);

        $consulta=nutricionConsulta::findOrFail($id);

        $consulta= new nutricionConsulta([
            'ocupacion'=> request('ocupacion'),
            'horarioscomida'=> request('horarioscomida'),
            'cantidadalimentos'=> request('cantidadalimentos'),
            'apetito'=> request('apetito'),
            'distension'=> request('distension'),
            'estrenimiento'=> request('estrenimiento'),
            'flatulencias'=> request('flatulencias'),
            'vomitos'=> request('vomitos'),
            'caries'=> request('caries'),
            'edema'=> request('edema'),
            'mareo'=> request('mareo'),
            'zumbido'=> request('zumbido'),
            'cefaleas'=> request('cefaleas'),
            'disnea'=> request('disnea'),
            'poliuria'=> request('poliuria'),
            'actividadfisica'=> request('actividadfisica'),
            'suenohoras'=> request('suenohoras'),
            'comidasdia'=> request('comidasdia'),
            'lugarcomida'=> request('lugarcomida'),
            'preparacomida'=> request('preparacomida'),
            'entrecomidas'=> request('entrecomidas'),
            'alimentospreferidos'=> request('alimentospreferidos'),
            'alimentosodiados'=> request('alimentosodiados'),
            'suplementos'=> request('suplementos'),
            'medicamentos'=> request('medicamentos'),
            'consumoagua'=> request('consumoagua'),
            'recordatoriodesayuno'=> request('recordatoriodesayuno'),
            'recordatoriocolacionm'=> request('recordatoriocolacionm'),
            'recordatoriocomida'=> request('recordatoriocomida'),
            'recordatoriocolaciont'=> request('recordatoriocolaciont'),
            'recordatoriocena'=> request('recordatoriocena'),
            'peso'=> request('peso'),
            'estatura'=> request('estatura'),
            'tipodieta'=> request('tipodieta'),
            'kilocaloriastotal'=> request('kilocaloriastotal'),
            'kilocaloriashidratos'=> request('kilocaloriashidratos'),
            'porcentajehidratos'=> request('porcentajehidratos'),
            'porcentajeproteinas'=> request('porcentajeproteinas'),
            'porcentajegrasas'=> request('porcentajegrasas'),
            'diagnostico'=> request('diagnostico'),
            'nota'=> request('nota'),
            //'beneficiario_id' => request('beneficiario_id'),
        ]);

        return redirect('beneficiario/'.$id)->with('editado','Cambios realizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = nutricionConsulta::find($id);
        $id=$consulta->beneficiario_id;
        $success = $consulta->delete();

        return redirect('beneficiario/'.$id)->with('nuevo','Nota borrada con éxito');

        // return [
        //      'success' => $success,
        //      'id' => $id,
        //      'notas' => $notas
        //  ];
    }
}

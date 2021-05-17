<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Beneficiario;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use Illuminate\Http\Request;

use App\Models\Notas;
use App\Models\tipoNota;
use App\Http\Resources\Notas as NotasResource;
use App\Http\Resources\tipoNota as tipoNotaResource;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['Notas']=NotasResource::collection(Notas::all());
        // $datos['Notas']=Notas::paginate(3);
        // dd($datos);
        //return view('notas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                //return Jornada::all();

        $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());
        //$tipo['TipoNota']=tipoNotaResource::collection(tipoNota::all());

        // $datos['Notas']=NotasResource::collection(Notas::all());

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
        //$beneficiario_id=auth()->beneficiario()->id();
        // $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());
        // $beneficiario_id =  $datos->id();
        // $request['beneficiario_id'] = $beneficiario_id;
        //$beneficiario_id=Beneficiario::
        request()->validate([
            'fecha' => 'required',
            'padecimiento' => 'required',
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

        $consulta = new Consulta([
            'tipoNota_id' => 1,
            'fecha' => request('fecha'),
            'comentario' => request('comentario'),
            'tiponota' => request('tiponota'),
            //'beneficiario_id' => request('beneficiario_id'),
        ]);

         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->notas()->save($nota);

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
        //$datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());


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
            'fecha' => 'required',
            'comentario' => 'required',
            'beneficiario_id' => 'required',
            'tiponota' => 'required',
        ]);

        $id=$consulta->beneficiario_id;

        $success = $consulta->update([
            'tipoNota_id' => 1,
            'fecha' => request('fecha'),
            'comentario' => request('comentario'),
            'tiponota' => request('tiponota'),
        ]);

        return redirect('beneficiario/'.$id)->with('editado','Cambios realizados con éxito');

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

        return redirect('beneficiario/'.$id)->with('nuevo','Consulta Borrada con Exitosamente');
    }
}
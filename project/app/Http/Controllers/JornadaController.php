<?php

namespace App\Http\Controllers;

use App\Models\Jornada;
use Illuminate\Http\Request;
use App\Http\Resources\Jornada as JornadaResource;


class JornadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Jornada::all();
        $datos['Jornada']=JornadaResource::collection(Jornada::all());
        return view('jornada.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jornada.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //
        request()->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'localidad' => 'required',
            'municipio' => 'required',
        ]);
    
        Jornada::create([
            'nombre' => request('nombre'),
            'fecha' => request('fecha'),
            'localidad' => request('localidad'),
            'municipio' => request('municipio'),
        ]);

        return redirect('jornada')->with('mensaje','Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function show(Jornada $jornada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function edit(Jornada $jornada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jornada $jornada)
    {
        
        request()->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'localidad' => 'required',
            'municipio' => 'required',
        ]);

        $success = $jornada->update([
            'nombre' => request('nombre'),
            'fecha' => request('fecha'),
            'localidad' => request('localidad'),
            'municipio' => request('municipio'),
        ]);

        return [
            'success' => $success
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jornada $jornada)
    {
        $success = $jornada->delete();

        return [
            'success' => $success
        ];
    }
}

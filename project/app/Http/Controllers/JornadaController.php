<?php

namespace App\Http\Controllers;

use App\Models\Jornada;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\Jornada as JornadaResource;
use App\Models\Beneficiario;

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
        $datos['Jornada']=JornadaResource::collection(Jornada::paginate(10));
        return view('jornada.index',$datos);

    }

    public function searchJornadas(Request $request){

        $jornadas = Jornada::where('nombre', 'like', '%'.$request->get('searchQuest'). '%')->get();

        return json_encode( $jornadas );
    }

    public function searchJornadasLoc(Request $request){

        $jornadas = Jornada::where('localidad', 'like', '%'.$request->get('searchQuest'). '%')->get();

        return json_encode( $jornadas );
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

        return redirect('jornada')->with('nuevo','Jornada agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jornada=Jornada::findOrFail($id);

        return view('jornada.show',compact('jornada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jornada=Jornada::findOrFail($id);

        return view('jornada.edit',compact('jornada'));
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

        // return [
        //     'success' => $success
        // ];
        return redirect('jornada')->with('editado','Cambios realizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jornada $jornada)
    {
        $jornada->beneficiarios()->detach();
        $success = $jornada->delete();

        // return [
        //     'success' => $success
        // ];

        return redirect('jornada')->with('eliminado','Jornada borrada con éxito');

        
    }

    public function anadirBeneficiario($id){
        $beneficiarios = Beneficiario::all();
        return view('jornada.assign', ["jornadaId" => $id, "beneficiarios" => $beneficiarios]);
    }

    public function asignarBeneficiario(Request $request){
        $jornadaId = request('jornada_id');
         request()->validate([
            'beneficiario_id' => ['required',Rule::unique('beneficiario_jornada', 'beneficiario_id')->where(function($query){
                                        return $query->where('jornada_id', request('jornada_id'));
                                    }),],
            'jornada_id' => 'required',
        ]);
        
        $jornada = Jornada::find($jornadaId);
        $jornada->beneficiarios()->attach(request('beneficiario_id'));
        return redirect('jornada')->with('asignado','Beneficiario asignado con éxito');
    }
}

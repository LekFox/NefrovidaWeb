<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Jornada as Jornada;

class BeneficiarioController extends Controller
{
    public function index()
    {
        //return Jornada::all();
        $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());
        return view('beneficiario.index',$datos);
        
    }

    public function show($id)
    {
        $beneficiario=Beneficiario::findOrFail($id);

        return view('beneficiario.show',compact('beneficiario'));
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
            'nombreBeneficiario' => 'required',
            'fechaNacimiento' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'escolaridad' => 'required',
            'estatus' => 'required',
        ]);
    
        Beneficiario::create([
            'nombreBeneficiario' => request('nombreBeneficiario'),
            'fechaNacimiento' => request('fechaNacimiento'),
            'sexo' => request('sexo'),
            'telefono' => request('telefono'),
            'direccion' => request('direccion'),
            'escolaridade_id' => request('escolaridade_id'),
            'estatus' => request('estatus'),
        ]);

        return redirect('beneficiario')->with('nuevo','Beneficiario agregada con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$arr = Jornada::getAllJornadas();
        $arr = Jornada::getAllJornadas();
        //dd(empty($arr));
        return view('beneficiario.create', ["jornadas" => $arr]);
    }

}

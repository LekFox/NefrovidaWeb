<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Jornada as Jornada;

class BeneficiarioController extends Controller
{
    //Regresa la colección de todos los beneficiarios.
    public function index()
    {
        $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());
        return view('beneficiario.index',$datos);
        
    }

    //Regresa un beneficiario en específico a partir de su id.
    public function show($id)
    {
        $beneficiario=Beneficiario::findOrFail($id);

        $Notas= Beneficiario::find($id)->notas;
        return view('beneficiario.show',compact('beneficiario','Notas'))->with(['id'=>$id]);
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
            'escolaridade_id' => 'required',
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


    // Permite buscar un beneficiario a partir del request AJAX.
    public function searchBeneficiarios(Request $request){

        $beneficiarios = Beneficiario::where('nombreBeneficiario', 'like', '%'.$request->get('searchQuest'). '%')
                        ->where('sexo', 'like', '%'.$request->get('searchQuestSexo'). '%')
                        ->where('seguimiento', 'like', '%'.$request->get('searchQuestSeguimiento'). '%')
                        ->get();
        
        return json_encode( $beneficiarios );
    }

    // Busca un beneficiario con el request AJAX y el parámetro edad.
    public function searchBeneficiariosAge(Request $request){

        $beneficiarios = Beneficiario::where('nombreBeneficiario', 'like', '%'.$request->get('searchQuest'). '%')
                        ->whereBetween('fechaNacimiento', [$request->get('fechaBegin'), $request->get('fechaEnd')])
                        ->where('sexo', 'like', '%'.$request->get('searchQuestSexo'). '%')
                        ->where('seguimiento', 'like', '%'.$request->get('searchQuestSeguimiento'). '%')
                        ->get();
        
        return json_encode( $beneficiarios );
    }
}

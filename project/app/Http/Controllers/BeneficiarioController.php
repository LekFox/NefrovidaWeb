<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Evaluacion;

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

        $evaluaciones = Evaluacion::all();

        return view('beneficiario.show',compact('beneficiario','Notas','evaluaciones'))->with(['id'=>$id]);
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

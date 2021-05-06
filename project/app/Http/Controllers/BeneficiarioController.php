<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;

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

    public function searchBeneficiarios(Request $request){

        $beneficiarios = Beneficiario::where('nombreBeneficiario', 'like', '%'.$request->get('searchQuest'). '%')
                        ->where('sexo', 'like', '%'.$request->get('searchQuestSexo'). '%')
                        ->get();
        
        return json_encode( $beneficiarios );
    }

    public function searchBeneficiariosAge(Request $request){

        $beneficiarios = Beneficiario::where('nombreBeneficiario', 'like', '%'.$request->get('searchQuest'). '%')
                        ->whereBetween('fechaNacimiento', [$request->get('fechaBegin'), $request->get('fechaEnd')])
                        ->where('sexo', 'like', '%'.$request->get('searchQuestSexo'). '%')
                        ->get();
        
        return json_encode( $beneficiarios );
    }

}

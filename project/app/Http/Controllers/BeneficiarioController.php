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

        $Notas= Beneficiario::find($id)->notas;
        return view('beneficiario.show',compact('beneficiario','Notas'))->with(['id'=>$id]);
    }

    
}

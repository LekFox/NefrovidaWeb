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
        return view('beneficiario.show',compact('beneficiario','Notas'))->with('id',$id);
    }

    public function addNote(Request $request,$id)
    {
        request()->validate([
            'fecha' => 'required',
            'comentario' => 'required',
        ]);
    
        Notas::create([
            'beneficiario_id' => $id,
            'tipoNota_id' => 1,
            'fecha' => 2000-10-10,
            'comentario' => "dede",
        ]);

        // $beneficiario=Beneficiario::find($id);
        // $nota= new Notas();
        // $nota->tipoNota_id = 1;
        // $nota->fecha = 2000-10-10;
        // $nota->comentario = "ded";


        return redirect('beneficiario')->with('nuevo','Nota agregada con éxito');
    }

}

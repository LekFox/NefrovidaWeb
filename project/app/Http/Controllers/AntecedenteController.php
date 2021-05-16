<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Beneficiario;
use App\Models\Antecedente;

class AntecedenteController extends Controller
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
        $beneficiario=Beneficiario::findOrFail($id);
        return view('antecedentes.create',compact('beneficiario'));
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
            'casa' => 'required',
            'serviciosBasicos' => 'required',
            'beneficiario_id' => 'required',
            'padreVivo' => 'required',
            'madreVivo' => 'required',
        ]);
        $antecedente= new Antecedente([
            'casa' => request('casa'),
            'serviciosBasicos' => request('serviciosBasicos'),
            'personalesPatologicos' => request('personalesPatologicos'),
            'personalesNoPatologicos' => request('personalesNoPatologicos'),
            'padreVivo' => request('padreVivo'),
            'enfermedadesPadre' => request('enfermedadesPadre'),
            'madreVivo' => request('madreVivo'),
            'enfermedadesMadre' => request('enfermedadesMadre'),
            'numHermanos' => request('numHermanos'),
            'numHermanosVivos' => request('numHermanosVivos'),
            'enfermedadesHermanos' => request('enfermedadesHermanos'),
            'otrosHermanos' => request('otrosHermanos'),
            'menarquia' => request('menarquia'),
            'ritmo' => request('ritmo'),
            'fum' => request('fum'),
            'gestaciones' => request('gestaciones'),
            'partos' => request('partos'),
            'abortos' => request('abortos'),
            'cesareas' => request('cesareas'),
            'ivsa' => request('ivsa'),
            'metodosAnticonceptivos' => request('metodosAnticonceptivos'),
            //'beneficiario_id' => request('beneficiario_id'),
        ]);

         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->antecedentes()->save($antecedente);

        return redirect('beneficiario/'.$id)->with('nuevo','Antecedentes registrados con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antecedentes=Antecedente::findOrFail($id);
        return view('antecedentes.show',compact('antecedentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $antecedentes=Antecedente::findOrFail($id);
        return view('antecedentes.edit',compact('antecedentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'casa' => 'required',
            'serviciosBasicos' => 'required',
            'id' => 'required',
            'padreVivo' => 'required',
            'madreVivo' => 'required',
        ]);

        $antecedentes=Antecedente::findOrFail($id);

        $success = $antecedentes->update([
            'casa' => request('casa'),
            'serviciosBasicos' => request('serviciosBasicos'),
            'personalesPatologicos' => request('personalesPatologicos'),
            'personalesNoPatologicos' => request('personalesNoPatologicos'),
            'padreVivo' => request('padreVivo'),
            'enfermedadesPadre' => request('enfermedadesPadre'),
            'madreVivo' => request('madreVivo'),
            'enfermedadesMadre' => request('enfermedadesMadre'),
            'numHermanos' => request('numHermanos'),
            'numHermanosVivos' => request('numHermanosVivos'),
            'enfermedadesHermanos' => request('enfermedadesHermanos'),
            'otrosHermanos' => request('otrosHermanos'),
            'menarquia' => request('menarquia'),
            'ritmo' => request('ritmo'),
            'fum' => request('fum'),
            'gestaciones' => request('gestaciones'),
            'partos' => request('partos'),
            'abortos' => request('abortos'),
            'cesareas' => request('cesareas'),
            'ivsa' => request('ivsa'),
            'metodosAnticonceptivos' => request('metodosAnticonceptivos'),
        ]);

        return redirect('antecedentes/'.$id)->with('editado','Cambios realizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

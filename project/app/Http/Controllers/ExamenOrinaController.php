<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Beneficiario;
use App\Models\ExamenOrina;

class ExamenOrinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $beneficiario=Beneficiario::findOrFail($id);
        return view('examenorina.create',compact('beneficiario'));
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
            'beneficiario_id' => 'required',
        ]);

        if (request('urobilinogeno') == null) {
            $urobilinogeno = '0.2';
        }
        else {
            $urobilinogeno = request('urobilinogeno');
        }


        $examenorina= new ExamenOrina([
            'color' => request('color'),
            'aspecto' => request('aspecto'),
            'ph' => request('ph'),
            'densidad' => request('densidad'),
            'nitritos' => request('nitritos'),
            'glucosa' => request('glucosa'),
            'proteinas' => request('proteinas'),
            'hemoglobina' => request('hemoglobina'),
            'cuerposCetonicos' => request('cuerposCetonicos'),
            'bilirribuna' => request('bilirribuna'),
            'urobilinogeno' => $urobilinogeno,
            'leucocitos' => request('leucocitos'),
            'eritrocitosIntactos' => request('eritrocitosIntactos'),
            'eritrocitosCrenados' => request('eritrocitosCrenados'),
            'observacionLeucocitos' => request('observacionLeucocitos'),
            'cristales' => request('cristales'),
            'cilindros' => request('cilindros'),
            'celulasEpiteliales' => request('celulasEpiteliales'),
            'bacterias' => request('bacterias'),
            'nota' => request('nota'),
            'metodo' => request('metodo'),
            'observaciones' => request('observaciones'),
            'fecharegistro' => request('fecharegistro'),
        ]);

         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->antecedentes()->save($examenorina);

        return redirect('beneficiario/'.$id)->with('nuevo','Examen de orina registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examenorina=ExamenOrina::findOrFail($id);
        return view('examenorina.show',compact('examenorina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examenorina=ExamenOrina::findOrFail($id);
        return view('examenorina.edit',compact('examenorina'));
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
            'id' => 'required',
        ]);

        $examenorina = ExamenOrina::findOrFail($id);

        $success= $examenorina -> update([
            'color' => request('color'),
            'aspecto' => request('aspecto'),
            'ph' => request('ph'),
            'densidad' => request('densidad'),
            'nitritos' => request('nitritos'),
            'glucosa' => request('glucosa'),
            'proteinas' => request('proteinas'),
            'hemoglobina' => request('hemoglobina'),
            'cuerposCetonicos' => request('cuerposCetonicos'),
            'bilirribuna' => request('bilirribuna'),
            'urobilinogeno' => request('urobilinogeno'),
            'leucocitos' => request('leucocitos'),
            'eritrocitosIntactos' => request('eritrocitosIntactos'),
            'eritrocitosCrenados' => request('eritrocitosCrenados'),
            'observacionLeucocitos' => request('observacionLeucocitos'),
            'cristales' => request('cristales'),
            'cilindros' => request('cilindros'),
            'celulasEpiteliales' => request('celulasEpiteliales'),
            'bacterias' => request('bacterias'),
            'nota' => request('nota'),
            'metodo' => request('metodo'),
            'observaciones' => request('observaciones'),
            'fecharegistro' => request('fecharegistro'),
        ]);

        return redirect('examenorina/'.$id)->with('editado','Cambios realizados con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $examenorina=ExamenOrina::findOrFail($id);
        $id_beneficiario = request('id_beneficiario');
        $success = $examenorina->delete();
        return redirect('beneficiario/'.$id_beneficiario)->with('eliminado','E.G.O. borrado con éxito');
    }
}

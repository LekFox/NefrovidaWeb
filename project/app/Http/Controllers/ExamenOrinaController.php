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

        if (request('nitritos') == null) {
            $nitritos = '0.2';
        }
        else {
            $nitritos = request('nitritos');
        }
        if (request('glucosa') == null) {
            $glucosa = '0.2';
        }
        else {
            $glucosa = request('glucosa');
        }
        if (request('proteinas') == null) {
            $proteinas = '0.2';
        }
        else {
            $proteinas = request('proteinas');
        }
        if (request('hemoglobina') == null) {
            $hemoglobina = '0.2';
        }
        else {
            $hemoglobina = request('hemoglobina');
        }
        if (request('cuerposCetonicos') == null) {
            $cuerposCetonicos = '0.2';
        }
        else {
            $cuerposCetonicos = request('cuerposCetonicos');
        }
        if (request('bilirribuna') == null) {
            $bilirribuna = '0.2';
        }
        else {
            $bilirribuna = request('bilirribuna');
        }
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
            'nitritos' => $nitritos,
            'glucosa' => $glucosa,
            'proteinas' => $proteinas,
            'hemoglobina' => $hemoglobina,
            'cuerposCetonicos' => $cuerposCetonicos,
            'bilirribuna' => $bilirribuna,
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
        //
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
        //
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

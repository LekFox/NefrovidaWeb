<?php

namespace App\Http\Controllers;

use App\Models\NotasPsic;
use Illuminate\Http\Request;
use App\Models\Beneficiario;
use Illuminate\Support\Facades\Stroage;

use App\Http\Resources\NotasPsic as NotasResource;
use App\Http\Resources\Beneficiario as BeneficiarioResource;

class NotasPsicController extends Controller
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
        return view('notaspsic.create',compact('beneficiario'));
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
            'fecha' => 'required',
            'comentario' => 'required',
            'beneficiario_id' => 'required',
            
        ]);
        
        $nota = new NotasPsic();

        if( $request->file != null) {
        $file = $request->file;
        $filename = time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $nota->file=$filename;
        }

        $nota->fecha=$request->fecha;
        $nota->comentario=$request->comentario;


         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->notaspsic()->save($nota);

        return redirect('beneficiario/'.$id)->with('nuevo','Nota agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotasPsic  $notasPsic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notas=NotasPsic::findOrFail($id);

        return view('notaspsic.show',compact('notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotasPsic  $notasPsic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notas=NotasPsic::findOrFail($id);
        //$datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());


        return view('notaspsic.edit',compact('notas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotasPsic  $notasPsic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notas = NotasPsic::find($id);
        request()->validate([
            'fecha' => 'required',
            'comentario' => 'required',
            'beneficiario_id' => 'required',
            
        ]);

        if( $request->file != null) {
            $file = $request->file;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('assets', $filename);
            $id=$notas->beneficiario_id;

        $success = $notas->update([
            // 'tipoNota_id' => 1,
            'fecha' => request('fecha'),
            'comentario' => request('comentario'),
            'file' => $filename,
        ]);
            }else{

        $id=$notas->beneficiario_id;

        $success = $notas->update([
            // 'tipoNota_id' => 1,
            'fecha' => request('fecha'),
            'comentario' => request('comentario'),
        ]);}

        return redirect('beneficiario/'.$id)->with('editado','Cambios realizados con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotasPsic  $notasPsic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notas = NotasPsic::find($id);
        $id=$notas->beneficiario_id;
        $success = $notas->delete();

        return redirect('beneficiario/'.$id)->with('nuevo','Nota borrada con éxito');
    }
}

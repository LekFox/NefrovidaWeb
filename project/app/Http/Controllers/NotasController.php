<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use App\Models\Beneficiario;
use App\Models\tipoNota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;

use App\Http\Resources\Notas as NotasResource;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Http\Resources\tipoNota as tipoNotaResource;




class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['Notas']=NotasResource::collection(Notas::all());
        // $datos['Notas']=Notas::paginate(3);
        // dd($datos);
        //return view('notas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
                //return Jornada::all();

        // $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());
        //$tipo['TipoNota']=tipoNotaResource::collection(tipoNota::all());

        // $datos['Notas']=NotasResource::collection(Notas::all());

        $beneficiario=Beneficiario::findOrFail($id);
        return view('notas.create',compact('beneficiario'));
        // return view('notas.create',$datos);
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
            'tiponota' => 'required',
        ]);
        
        $nota = new Notas();

        if( $request->file != null) {
        $file = $request->file;
        $filename = time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        $nota->file=$filename;
        }

        $nota->fecha=$request->fecha;
        $nota->comentario=$request->comentario;
        $nota->tiponota=$request->tiponota;

        // $nota= new Notas([
        //     // 'tipoNota_id' => 1,
        //     'fecha' => request('fecha'),
        //     'comentario' => request('comentario'),
        //     'tiponota' => request('tiponota'),
        //     'file' => $filename,
        //     //'beneficiario_id' => request('beneficiario_id'),
        // ]);

         $id = request('beneficiario_id');
         $beneficiario = Beneficiario::find($id);
         $beneficiario->notas()->save($nota);

        return redirect('beneficiario/'.$id)->with('nuevo','Nota agregada con éxito');
        //return redirect()->back()->with('nuevo','Nota agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notas=Notas::findOrFail($id);

        return view('notas.show',compact('notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notas=Notas::findOrFail($id);
        //$datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::all());


        return view('notas.edit',compact('notas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $notas = Notas::find($id);
        request()->validate([
            'fecha' => 'required',
            'comentario' => 'required',
            'beneficiario_id' => 'required',
            'tiponota' => 'required',
        ]);

        if( $request->file != null) {
            $file = $request->file;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('assets', $filename);
            }

        $id=$notas->beneficiario_id;

        $success = $notas->update([
            // 'tipoNota_id' => 1,
            'fecha' => request('fecha'),
            'comentario' => request('comentario'),
            'tiponota' => request('tiponota'),
            'file' => $filename,
        ]);

        return redirect('beneficiario/'.$id)->with('editado','Cambios realizados con éxito');

        // return [
        //          'success' => $success,
        //           'id' => $id,
        //           'notas' => $notas
        //       ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notas = Notas::find($id);
        $id=$notas->beneficiario_id;
        $success = $notas->delete();

        return redirect('beneficiario/'.$id)->with('nuevo','Nota borrada con éxito');

        // return [
        //      'success' => $success,
        //      'id' => $id,
        //      'notas' => $notas
        //  ];
    }
}

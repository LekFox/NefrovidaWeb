<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use App\Models\ExamenOrina;
use App\Models\micro;
use App\Models\QuimicaSanguinea;
use App\Models\DepuracionCreatinina;
use App\Models\nutricionConsulta;
use App\Models\consulta;
use App\Models\evidencia;
use App\Models\nefropediatria;
use Illuminate\Http\Request;
use App\Http\Resources\Beneficiario as BeneficiarioResource;
use App\Models\Jornada as Jornada;
use App\Models\Beneficiario as Beneficiario;
use Illuminate\Support\Facades\DB;

class BeneficiarioController extends Controller
{
    //Regresa la colección de todos los beneficiarios.
    public function index()
    {
        $datos['Beneficiario']=BeneficiarioResource::collection(Beneficiario::paginate(10));
        // $datos = DB::table('beneficiarios')
        //         ->orderBy('id', 'desc')
        //         ->paginate(10);
        // return view('beneficiario.index',['Beneficiario' => $datos]);
        return view('beneficiario.index',$datos);

        
    }

    //Regresa un beneficiario en específico a partir de su id.
    public function show($id)
    {
        $beneficiario=Beneficiario::findOrFail($id);

        //$Notas= Beneficiario::find($id)->notas->paginate(3);
        $Notas = Notas::where('beneficiario_id', $id)->orderBy('id', 'desc')->paginate(3,['*'],'Notas');
        $Nutricion = nutricionConsulta::where('beneficiario_id', $id)->orderBy('id', 'desc')->paginate(3,['*'],'Nutricion');
        $ExamenesOrina = ExamenOrina::where('beneficiario_id', $id)->orderBy('id', 'desc')->paginate(3,['*'],'Orina');
        $microE = micro::where('beneficiario_id', $id)->orderBy('id', 'desc')->paginate(3,['*'],'micro');
        $consulta = consulta::where('beneficiario_id', $id)->orderBy('id', 'desc')->paginate(3,['*'],'Consulta');
        $evidencia = evidencia::where('beneficiario_id', $id)->orderBy('id', 'desc')->paginate(3,['*'],'evidencia');
        $nefropediatria = nefropediatria::where('beneficiario_id', $id)->orderBy('id', 'desc')->paginate(3,['*'],'Nefropediatria');
        $QuimicasSanguinea = QuimicaSanguinea::where('beneficiario_id', $id)->orderBy('id', 'desc')->paginate(3,['*'],'Sanguinea');
        $DepuracionesCreatinina = DepuracionCreatinina::where('beneficiario_id', $id)->orderBy('id', 'desc')->paginate(3,['*'],'Creatinina');

        return view('beneficiario.show',compact('beneficiario','Notas','Nutricion','consulta','nefropediatria', 'ExamenesOrina', 'QuimicasSanguinea', 'DepuracionesCreatinina', 'microE', 'evidencia'))->with(['id'=>$id]);
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
            'jornada_id' => 'required|numeric',
            'fechaNacimiento' => 'required',
            'sexo' => 'required',
            'telefono' => 'required|numeric',
            'direccion' => 'nullable',
            'escolaridade_id' => 'required',
            'seguimiento' => 'required',
            'descAfricana' => 'required',
            'fecharegistro' => 'nullable',//'required',
        ]);
    

        $beneficiario = Beneficiario::create([
            'nombreBeneficiario' => request('nombreBeneficiario'),
            'fechaNacimiento' => request('fechaNacimiento'),
            'sexo' => request('sexo'),
            'telefono' => request('telefono'),
            'direccion' => request('direccion'),
            'escolaridade_id' => request('escolaridade_id'),
            'seguimiento' => request('seguimiento'),
            'descAfricana' => request('descAfricana'),
            //'fecharegistro' => request('fecharegistro'),
        ]);

        $beneficiario->jornadas()->attach(request('jornada_id'));

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
    
    public function edit($id)
    {
        $beneficiarioEdit = Beneficiario::find($id);
        $arr = Jornada::getAllJornadas();
        return view('beneficiario.create', ["jornadas" => $arr, "beneficiario" => $beneficiarioEdit]);
    }

    public function update(Request $request, Beneficiario $beneficiario)
    {
        $data =[
        'nombreBeneficiario', 'fechaNacimiento', 'sexo', 'telefono', 'direccion', 'escolaridade_id', 'estatus'
        ];

        request()->validate([
            'nombreBeneficiario' => 'required',
            'jornada_id' => 'required|numeric',
            'fechaNacimiento' => 'required',
            'sexo' => 'required',
            'telefono' => 'required|numeric',
            'direccion' => 'nullable',
            'escolaridade_id' => 'required',
            'seguimiento' => 'required',
            'descAfricana' => 'required',
            'fecharegistro' => 'nullable',//'required',

        ]);
        $beneficiario->update([
            'nombreBeneficiario' => $request->input('nombreBeneficiario'),
            'fechaNacimiento' => $request->input('fechaNacimiento'), 
            'sexo'  => $request->input('sexo'), 
            'telefono'  => $request->input('telefono'), 
            'direccion'  => $request->input('direccion'), 
            'escolaridade_id'  => $request->input('escolaridade_id'), 
            'seguimiento' => $request->input('seguimiento'), 
            'descAfricana' => $request->input('descAfricana'),
            //'fecharegistro' => $request->input('fecharegistro')
            ]);
        if ($beneficiario->jornadas->isEmpty())
        {
            $beneficiario->jornadas()->attach($request->input('jornada_id'));
        }
        else {
            $jornadaId = $beneficiario->jornadas[0]->pivot->jornada_id;
            $beneficiario->jornadas()->updateExistingPivot($jornadaId, ['jornada_id' => $request->input('jornada_id'),]);
        }
        
        return redirect('beneficiario')->with('nuevo','Beneficiario editado con éxito');
    }

    public function destroy(Beneficiario $beneficiario)
    {
        $jornadaId = $beneficiario->jornadas[0]->pivot->jornada_id;
        $beneficiario->jornadas()->detach();
        $success = $beneficiario->delete();
        return redirect('jornada/'.$jornadaId)->with('asignado','Beneficiario eliminado con éxito');
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

    public function getBeneficiarioData ($id){
        $beneficiario = Beneficiario::with('escolaridade:id,nombreEscolaridad')->where('beneficiarios.id', $id)->first();
        return $beneficiario;
    }
    
//     function fetch(Request $request)
//     {
//      if($request->ajax())
//      {
//       $data = DB::table('sample_datas')->Paginate(3);
//          return view('beneficiario.show', compact('data'))->render();
//      }
//     }

}

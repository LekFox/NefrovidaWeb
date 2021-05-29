<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FactorDeRiesgo extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiario_id','pregunta_id','respuesta','enfermedad'
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

    public function preguntasRiesgos()
    {
        return $this->hasMany(PreguntaRiesgo::class);
    }

    public static function saveFactoresDeRiesgo($id,$data, $enfermedad)
    {
        /*$beneficiario = Beneficiario::find($id);*/
       /* $factores = new FactorDeRiesgo;
       $preguntas = $factores->preguntasRiesgos;*/

       $index = 0;

       $aux_enfermedad = $enfermedad;

       foreach($data as $respuesta){
           $aux_enfermedad = ($index == 1) ? $enfermedad : NULL;
           
           $preguntas = explode('_', $respuesta);
           $respuesta = FactorDeRiesgo::create([
               'pregunta_id' => $preguntas[1],
               'respuesta' => $preguntas[0],
               'enfermedad' => $aux_enfermedad,
               'beneficiario_id' => $id
           ]);

           /*foreach($preguntas as $pregunta){
               $respuesta = DB::table('factor_de_riesgos')->save([
                'pregunta_id' => 1,
                'respuesta' => $data[$index],
                'enfermedad' => $data[12],
                'beneficiario_id' => 3
               ]);*/
               $index++;
           }

           $beneficiario = Beneficiario::find($id);
           $beneficiario->factoresDeRiesgo()->save($respuesta);
           
            
           
           
       }

       public static function findBeneficiario($id)
       {
            $riesgos = FactorDeRiesgo::where('beneficiario_id',$id);
            return $riesgos;
       }
    
}

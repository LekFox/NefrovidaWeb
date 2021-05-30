<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionFinal extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiario_id','pregunta_id','respuesta','edad','grado','grupo','sexo'
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
    
    public static function saveEvaluacionFinal($id, $edad, $grado, $grupo, $sexo, $data)
    {
        
        $index = 0;
        

        foreach($data as $respuesta){
            $preguntas = explode('_', $respuesta);
            $respuesta = EvaluacionFinal::create([
                'pregunta_id' => $preguntas[1],
                'respuesta' => $preguntas[0],
                'edad' => $edad,
                'grado' => $grado,
                'grupo' => $grupo,
                'sexo' => $sexo,
                'beneficiario_id' => $id


            ]);
            $index++;
        }

        $beneficiario = Beneficiario::find($id);
        $beneficiario->evaluacionInicial()->save($respuesta);
        
    }

}

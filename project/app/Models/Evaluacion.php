<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RespuestaEvaluacion;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = "evaluaciones";

    public function preguntasEvaluacion()
    {
        return $this->hasMany(PreguntaEvaluacion::class);

    } 

    public static function saveEvaluacionInicial($data)
    {
        $evaluacion = self::find(1);

        //self::where("etiqueta","inicial")->first(); //nombre del campo, lo que tiene que tener el campo

        $preguntas = $evaluacion->preguntasEvaluacion;

        $index=0;

        foreach($preguntas as $pregunta){
            $respuesta = RespuestaEvaluacion::create([
                'pregunta_evaluacion_id' => $pregunta->id,
                'respuesta' => $data[$index]
            ]);

            $index++;
            
        }

        //dd($preguntas);
    }

    
}

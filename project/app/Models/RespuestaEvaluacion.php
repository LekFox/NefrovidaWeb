<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaEvaluacion extends Model
{
    use HasFactory;

    protected $fillable = ['pregunta_evaluacion_id', 'respuesta'];


    protected $table = "respuestas_evaluacion";


    public function preguntaEvaluacion()
    {
        return $this->belongsTo(PreguntaEvaluacion::class);

    } 
}

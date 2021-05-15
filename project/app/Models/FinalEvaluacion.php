<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalEvaluacion extends Model
{
    use HasFactory;

    protected $fillable = ['pregunta_evaluacion_id', 'respuesta'];

    protected $table = "respuestas_evaluacion_final";

    public function preguntaFinalEvaluacion()
    {

        return $this->belongsTo(PreguntaEvaluacion::class);

    } 
}

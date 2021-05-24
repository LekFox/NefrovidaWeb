<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaEvaluacion extends Model
{
    use HasFactory;

    protected $table = "preguntas_evaluacion";

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class);
    } 

    public function respuestasEvaluacion()
    {
        return $this->hasMany(RespuestaEvaluacion::class);
    } 

    public function respuestasFinalesEvaluacion()
    {
        return $this->hasMany(FinalEvaluacion::class);
    }
}

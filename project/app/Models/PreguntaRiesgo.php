<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaRiesgo extends Model
{
    use HasFactory;

    protected $table = "preguntas_riesgos";

    public function factoresDeRiesgo()
    {
        return $this->belongsTo(FactorDeRiesgo::class);
    }
}

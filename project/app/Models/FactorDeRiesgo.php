<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FactorDeRiesgo extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiario_id','respuesta','enfermedad'
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

    public function preguntasRiesgos()
    {
        return $this->hasMany(PreguntaRiesgo::class);
    }
}

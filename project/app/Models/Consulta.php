<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable =[
        'padecimiento', 
        'TAbrazoDerecho',
        'TAbrazoIzquierdo',
        'frecuenciaCardiaca',
        'frecuenciaRespiratoria',
        'temperatura',
        'peso',
        'talla',
        'cabezaCuello',
        'torax',
        'abdomen',
        'extremidades',
        'estadoMentalNeurologico',
        'observaciones',
        'diagnostico',
        'tratamiento',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

}

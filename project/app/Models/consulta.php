<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consulta extends Model
{
    use HasFactory;

    protected $fillable =[
        'beneficiario_id', 
        'fecha',
        'padecimiento',
        'brazoD',
        'brazoI',
        'fCardiaca',
        'fRespiratoria',
        'temperatura',
        'peso',
        'talla',
        'cabeza',
        'torax',
        'abdomen',
        'extremidades',
        'mental',
        'observaciones',
        'diagnostico',
        'tratamiento',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}

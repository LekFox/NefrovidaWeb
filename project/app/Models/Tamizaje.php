<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamizaje extends Model
{
    use HasFactory;

    protected $fillable =[
        'sistolica', 'diastolica', 'beneficiario_id', 'circunferenciaCintura', 'circunferenciaCadera',
        'glucosaCapilar', 'talla', 'peso', 'indiceCinturaCadera', 'comentario', 'dx', 'imc', 'dxpresion',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beneficiario;

class DepuracionCreatinina extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiario_id', 'talla', 'peso', 'volumen', 'superficieCorporal', 'creatininaSuero', 'creatininaOrina' , 'creatininaDepuracion', 'nota', 'metodo',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}

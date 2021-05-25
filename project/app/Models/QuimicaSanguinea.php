<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beneficiario;

class QuimicaSanguinea extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiario_id', 'glucosa', 'urea', 'bun', 'creatina', 'acidoUrico' , 'colesterolTotal', 'trigliceridos', 'nota', 'metodo',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}

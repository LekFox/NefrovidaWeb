<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    protected $fillable =[
        'fecha', 'comentario', 'beneficiario_id'
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

    // public function tipo_nota()
    // {
    //     return $this->hasMany(Tipo_nota::class);
    // }
}

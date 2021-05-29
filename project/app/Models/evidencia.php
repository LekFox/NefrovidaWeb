<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evidencia extends Model
{
    use HasFactory;


    protected $fillable =[
        'beneficiario_id', 
        'nombre',
        'descripcion',
        'file',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}

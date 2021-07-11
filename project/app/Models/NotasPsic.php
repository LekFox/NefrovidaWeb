<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotasPsic extends Model
{
    use HasFactory;

    protected $fillable =[
        'fecha', 'comentario', 'beneficiario_id', 'file',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beneficiario;

class micro extends Model
{
    use HasFactory;

    protected $fillable =[
        'beneficiario_id', 
        'microalbumina',
        'creatinina',
        'microalbuminaCreatinina',
        'metodo',
        'nota',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

}
    
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    use HasFactory;

    protected $fillable =[
        'casa', 'serviciosBasicos', 'beneficiario_id', 'serviciosBasicos', 'personalesPatologicos',
        'personalesNoPatologicos', 'padreVivo', 'enfermedadesPadre', 'madreVivo', 'enfermedadesMadre',
        'numHermanos', 'numHermanosVivos', 'enfermedadesHermanos', 'otrosHermanos', 'menarquia',
        'ritmo', 'fum', 'gestaciones', 'partos', 'abortos', 'cesareas', 'ivsa', 'metodosAnticonceptivos',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}

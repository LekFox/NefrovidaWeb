<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenOrina extends Model
{
    use HasFactory;

    protected $fillable =[
        'color', 'aspecto', 'beneficiario_id', 'ph', 'densidad',
        'nitritos', 'glucosa', 'proteinas', 'hemoglobina', 'cuerposCetonicos',
        'bilirribuna', 'urobilinogeno', 'leucocitos', 'eritrocitosIntactos', 'eritrocitosCrenados',
        'observacionLeucocitos', 'cristales', 'cilindros', 'celulasEpiteliales', 'bacterias', 'nota', 'metodo', 'observaciones', 'fecharegistro',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}

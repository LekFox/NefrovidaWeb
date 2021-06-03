<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nutricionConsulta extends Model
{
    use HasFactory;

    protected $fillable =[
        'beneficiario_id', 
        'ocupacion',
        'horarioscomida',
        'cantidadalimentos',
        'apetito',
        'distension',
        'estrenimiento',
        'flatulencias',
        'vomitos',
        'caries',
        'edema',
        'mareo',
        'zumbido',
        'cefaleas',
        'disnea',
        'poliuria',
        'actividadfisica',
        'suenohoras',
        'comidasdia',
        'lugarcomida',
        'preparacomida',
        'entrecomidas',
        'alimentospreferidos',
        'alimentosodiados',
        'suplementos',
        'medicamentos',
        'consumoagua',
        'recordatoriodesayuno',
        'recordatoriocolacionm',
        'recordatoriocomida',
        'recordatoriocolaciont',
        'recordatoriocena',
        'peso',
        'estatura',
        'tipodieta',
        'kilocaloriastotal',
        'kilocaloriashidratos',
        'porcentajehidratos',
        'porcentajeproteinas',
        'porcentajegrasas',
        'diagnostico',
        'nota',
        'imc',
        'fecha',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}

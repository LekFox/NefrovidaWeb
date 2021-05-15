<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Beneficiario extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombreBeneficiario', 'fechaNacimiento', 'sexo', 'telefono', 'direccion', 'escolaridade_id', 'estatus'
    ];

    //Regresa las jornadas a las que pertenece un beneficiario
    public function jornadas(){
        return $this->belongsToMany(Jornada::class);
    }

    //Regresa el atributo edad parseado con Carbon a partir de la fecha de Nacimiento.
    public function getAgeAttribute()
    {
    return Carbon::parse($this->attributes['fechaNacimiento'])->age;
    }

    public function notas()
    {
        return $this->hasMany(Notas::class);
    }

    public function nutricionConsulta()
    {
        return $this->hasMany(nutricionConsulta::class);
    }
}

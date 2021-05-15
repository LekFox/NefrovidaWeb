<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Beneficiario extends Model
{
    use HasFactory;
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

    //Regresa los registros de Antecedentes de un beneficiario
    public function antecedentes(){
        return $this->hasOne(Antecedente::class);
    }

}

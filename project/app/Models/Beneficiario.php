<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Beneficiario extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombreBeneficiario', 'fechaNacimiento', 'sexo', 'telefono', 'direccion', 'escolaridade_id', 'estatus', 'seguimiento'
    ];

    protected $table = "beneficiarios";

    //Regresa las jornadas a las que pertenece un beneficiario
    public function jornadas(){
        return $this->belongsToMany(Jornada::class)->withTimestamps();;
    }

    public function getJornadaName(){
        $name = $this->jornadas->pluck("nombre");
        //head($name);
        return $name[0];
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

    public function consulta(){
        return $this->hasOne(consulta::class);
    }

    public function escolaridade()
    {
        return $this->belongsTo(Escolaridade::class);
    }

    public function nutricionConsulta()
    {
        return $this->hasMany(nutricionConsulta::class);
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Beneficiario extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombreBeneficiario' => $this->nombreBeneficiario,
            'fechaNacimiento' => $this->fechaNacimiento,
            'sexo' => $this->sexo,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'escolaridade_id' => $this->escolaridade_id,
            //'estatus' => $this->estatus,
            'seguimiento' => $this->seguimiento,
        ];
    }
}

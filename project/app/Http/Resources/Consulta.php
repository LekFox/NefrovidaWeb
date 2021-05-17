<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Consulta extends JsonResource
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
            'beneficiario_id'=> $this->beneficiario_id, 
            'padecimiento'=> $this->padecimiento,
            'TAbrazoDerecho'=> $this->TAbrazoDerecho,
            'TAbrazoIzquierdo'=> $this->TAbrazoIzquierdo,
            'frecuenciaCardiaca'=> $this->frecuenciaCardiaca,
            'frecuenciaRespiratoria'=> $this->frecuenciaRespiratoria,
            'temperatura'=> $this->temperatura,
            'peso'=> $this->peso,
            'talla'=> $this->talla,
            'cabezaCuello'=> $this->cabezaCuello,
            'torax'=> $this->torax,
            'abdomen'=> $this->abdomen,
            'extremidaes'=> $this->extremidaes,
            'estadoMentalNeurologico'=> $this->estadoMentalNeurologico,
            'observaciones'=> $this->observaciones,
            'diagnostico'=> $this->diagnostico,
            'tratamiento'=> $this->tratamiento,
        ];
    }
}

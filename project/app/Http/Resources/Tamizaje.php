<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tamizaje extends JsonResource
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
            'beneficiario_id' => $this->beneficiario_id,
            'sistolica' => $this->sistolica,
            'diastolica' => $this->diastolica,
            'circunferenciaCintura' => $this->circunferenciaCintura,
            'circunferenciaCadera' => $this->circunferenciaCadera,
            'glucosaCapilar' => $this->glucosaCapilar,
            'talla' => $this->talla,
            'peso' => $this->talla,
            'indiceCinturaCadera' => $this->indiceCinturaCadera,
            'comentario' => $this->comentario,
        ];
    }
}

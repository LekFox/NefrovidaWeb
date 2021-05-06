<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Notas extends JsonResource
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
            'tipoNota_id' => $this->tipoNota_id,
            'fecha' => $this->fecha,
            'comentario' => $this->comentario,
        ];
    }
}

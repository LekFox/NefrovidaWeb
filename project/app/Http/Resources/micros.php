<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class micro extends JsonResource
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
            'microalbumina'=> $this->microalbumina,
            'creatinina'=> $this->creatinina,
            'microalbuminaCreatinina'=> $this->microalbuminaCreatinina,
            'metodo'=> $this->metodo,
            'nota'=> $this->nota,
        ];
    }
}
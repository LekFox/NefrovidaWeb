<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Antecedente extends JsonResource
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
            'casa' => $this->casa,
            'serviciosBasicos' => $this->serviciosBasicos,
            'personalesPatologicos' => $this->personalesPatologicos,
            'personalesNoPatologicos' => $this->personalesNoPatologicos,
            'padreVivo' => $this->padreVivo,
            'enfermedadesPadre' => $this->enfermedadesPadre,
            'madreVivo' => $this->madreVivo,
            'enfermedadesMadre' => $this->enfermedadesMadre,
            'numHermanos' => $this->numHermanos,
            'numHermanosVivos' => $this->numHermanosVivos,
            'enfermedadesHermanos' => $this->enfermedadesHermanos,
            'otrosHermanos' => $this->otrosHermanos,
            'menarquia' => $this->menarquia,
            'ritmo' => $this->ritmo,
            'fum' => $this->fum,
            'gestaciones' => $this->gestaciones,
            'partos' => $this->partos,
            'abortos' => $this->abortos,
            'cesareas' => $this->cesareas,
            'ivsa' => $this->ivsa,
            'metodosAnticonceptivos' => $this->metodosAnticonceptivos,
        ];
    }
}

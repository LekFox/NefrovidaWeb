<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class nutricionConsulta extends JsonResource
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
            'ocupacion'=> $this->ocupacion,
            'horarioscomida'=> $this->horarioscomida,
            'cantidadalimentos'=> $this->cantidadalimentos,

            'apetito'=> $this->apetito,
            'distension'=> $this->distension,
            'estrenimiento'=> $this->estrenimiento,
            'flatulencias'=> $this->flatulencias,
            'vomitos'=> $this->vomitos,
            'caries'=> $this->caries,

            'edema'=> $this->edema,
            'mareo'=> $this->mareo,
            'zumbido'=> $this->zumbido,
            'cefaleas'=> $this->cefaleas,
            'disnea'=> $this->disnea,
            'poliuria'=> $this->poliuria,

            'actividadfisica'=> $this->actividadfisica,
            'suenohoras'=> $this->suenohoras,

            'comidasdia'=> $this->comidasdia,
            'lugarcomida'=> $this->lugarcomida,
            'preparacomida'=> $this->preparacomida,
            'entrecomidas'=> $this->entrecomidas,
            'alimentospreferidos'=> $this->alimentospreferidos,
            'alimentosodiados'=> $this->alimentosodiados,
            'suplementos'=> $this->suplementos,
            'medicamentos'=> $this->medicamentos,
            'consumoagua'=> $this->consumoagua,

            'recordatoriodesayuno'=> $this->recordatoriodesayuno,
            'recordatoriocolacionm'=> $this->recordatoriocolacionm,
            'recordatoriocomida'=> $this->recordatoriocomida,
            'recordatoriocolaciont'=> $this->recordatoriocolaciont,
            'recordatoriocena'=> $this->recordatoriocena,

            'peso'=> $this->peso,
            'estatura'=> $this->estatura,

            'tipodieta'=> $this->tipodieta,
            'kilocaloriastotal'=> $this->kilocaloriastotal,
            'kilocaloriashidratos'=> $this->kilocaloriashidratos,
            'porcentajehidratos'=> $this->porcentajehidratos,
            'porcentajeproteinas'=> $this->porcentajeproteinas,
            'porcentajegrasas'=> $this->porcentajegrasas,
            
            'diagnostico'=> $this->diagnostico,
            'nota'=> $this->nota,
            'imc'=> $this->imc,
        ];
    }
}

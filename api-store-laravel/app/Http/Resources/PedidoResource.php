<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo, 
            'fecha_entrega' => $this->fecha_entrega, 
            'direccion_entrega' => $this->direccion_entrega, 
            'prioridad' => $this->getPrioridad($this->prioridad), 
            'entregado' => $this->getEntregado($this->entregado)
        ];
    }

    public function getEntregado($entregado)
    {
        $data = [
            0 => 'No',
            1 => 'Si'
        ];

        return $data[$entregado];
    }

    public function getPrioridad($prioridad)
    {
        $data = [
            1 => 'Muy alta',
            2 => 'Alta',
            3 => 'Media',
            4 => 'Baja',
            5 => 'Muy baja'
        ];

        return $data[$prioridad];
    }
}

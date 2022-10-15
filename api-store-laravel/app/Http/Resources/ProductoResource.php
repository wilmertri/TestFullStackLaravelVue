<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
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
            'codigo' => $this->codigo, 
            'nombre' => $this->nombre, 
            'descripcion' => $this->descripcion, 
            'precio_venta' => $this->precio_venta, 
            'precio_compra' => $this->precio_compra,  
            'proveedor' => $this->proveedor->nombre,
            'cantidad_stock' => $this->inventarios->sum('cantidad')
        ];
    }
}

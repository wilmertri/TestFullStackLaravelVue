<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = "pedidos";
    protected $fillable = ['codigo', 'fecha_entrega', 'direccion_entrega', 'prioridad', 'entregado'];

    public function productos()
    {
        return $this->belongsToMany('App\Models\Producto', 'pedidos_productos', 'pedido_id', 'producto_id')->withPivot('cantidad')->withTimestamps();
    }
}

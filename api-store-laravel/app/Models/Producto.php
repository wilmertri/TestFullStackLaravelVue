<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "productos";
    protected $fillable = ['codigo', 'nombre', 'descripcion', 'precio_venta', 'precio_compra', 'activo', 'en_stock', 'proveedor_id'];

    public function inventarios()
    {
        return $this->hasMany('App\Models\Inventario', 'producto_id');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_productos', 'producto_id', 'pedido_id')->withPivot('cantidad')->withTimestamps();
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor', 'proveedor_id');
    }
}

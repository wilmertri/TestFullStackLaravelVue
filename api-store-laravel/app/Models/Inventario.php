<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = "inventarios";
    protected $fillable = ['cantidad', 'producto_id', 'proveedor_id'];

    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'producto_id');
    }

    public function proveedores()
    {
        return $this->hasMany('App\Models\Proveedor', 'proveedor_id');
    }
}

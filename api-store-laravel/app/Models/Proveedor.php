<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = "proveedores";
    protected $fillable = ['codigo', 'nombre', 'direccion', 'telefono', 'email'];

    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'proveedor_id');
    }
}

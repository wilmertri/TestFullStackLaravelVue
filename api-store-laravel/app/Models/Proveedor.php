<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = "proveedores";
    protected $fillable = ['codigo', 'nombre', 'direccion', 'telefono', 'email'];

    public function inventario()
    {
        return $this->belongsTo('App\Models\Inventario', 'proveedor_id');
    }
}

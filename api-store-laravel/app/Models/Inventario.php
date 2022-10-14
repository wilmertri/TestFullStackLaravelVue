<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = "inventarios";
    protected $fillable = ['cantidad', 'producto_id'];

    public function productos()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id');
    }

}

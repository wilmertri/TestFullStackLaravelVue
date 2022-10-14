<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $producto = Producto::all()->random()->id;
        $proveedor = Proveedor::all()->random()->id;
        return [
            'cantidad' => fake()->numberBetween(1, 50), 
            'producto_id' => $producto,  
            'proveedor_id' => $proveedor
        ];
    }
}

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
        $producto = Producto::whereDoesntHave('inventarios')->get()->random()->id;
        return [
            'cantidad' => fake()->numberBetween(0, 50), 
            'producto_id' => $producto
        ];
    }
}

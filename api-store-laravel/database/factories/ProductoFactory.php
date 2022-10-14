<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $precio_compra = fake()->randomNumber(5);
        $precio_venta = $precio_compra + ($precio_compra * 0.25); 
        return [
            'codigo' => fake()->unique()->randomNumber(8),
            'nombre' => fake()->word(),
            'descripcion' => fake()->sentence(),
            'precio_venta' => $precio_venta,
            'precio_compra' => $precio_compra,
            'activo' => fake()->boolean(),
            'en_stock' => fake()->boolean()
        ];
    }
}

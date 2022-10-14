<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codigo' => fake()->unique()->randomNumber(8), 
            'fecha_entrega' => fake()->dateTimeBetween('now', '2023-06-30'), 
            'direccion_entrega' => fake()->address(), 
            'prioridad' => fake()->numberBetween(1, 5), 
            'entregado' => fake()->boolean()
        ];
    }
}

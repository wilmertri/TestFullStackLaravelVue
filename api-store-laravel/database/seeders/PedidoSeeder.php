<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedido::factory()->count(200)->create()->each(
            function($pedido){
                $productos = Producto::all()->random(mt_rand(1, 5))->pluck('id');
                $pedido->productos()->attach($productos, ['cantidad' => fake()->numberBetween(0, 50)]);
            }
        );
    }
}

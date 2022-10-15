<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(InventarioSeeder::class);
        $this->call(PedidoSeeder::class);
    }
}

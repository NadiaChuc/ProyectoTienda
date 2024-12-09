<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permisos;
use App\Models\Producto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            ProductoSeeder::class,
            CarritoSeeder::class

        ]);

        User::factory(2)->create();
        Permisos::factory(3)->create();
        Producto::factory(120)->create();
    }
}

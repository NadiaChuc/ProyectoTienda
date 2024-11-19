<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permisos;
use App\Models\Compras;
use App\Models\Productos;
use App\Models\Detalles;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class
        ]);

        User::factory(2)->create();
        Permisos::factory(3)->create();
        Compras::factory(10)->create();
        Productos::factory(20)->create();
        Detalles::factory(10)->create();
    }
}

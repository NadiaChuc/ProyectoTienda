<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Compras;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detalles>
 */
class DetallesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_compra' => Compras::inRandomOrder()->first()-> id_compra,
            'id_producto' => Producto::inRandomOrder()->first()-> id_producto,
            'quantity' => fake()->numberBetween(1,10),
            'mount' => fake()->randomFloat(2,1,100)
        ];
    }
}

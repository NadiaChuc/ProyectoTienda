<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Producto::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word, // Nombre aleatorio
            'description' => $this->faker->sentence, // Oración aleatoria
            'precio' => $this->faker->randomFloat(2, 10, 1000), // Precio entre 10 y 1000
            'categoria' => $this->faker->randomElement(['ropa', 'accesorios', 'equipamiento']), // Categorías posibles
            'deporte' => $this->faker->randomElement(['futbol', 'basquetbol', 'beisbol', ]), // Deportes posibles
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->randomElement([
                'Casco', 'Guantes', 'Chaqueta', 'Pantalón', 'Botas',
                'Neumático', 'Cadena', 'Aceite', 'Filtro', 'Escape',
                'Suspensión', 'Frenos', 'Batería', 'Bujía', 'Intermitentes'
            ]) . ' ' . $this->faker->company;

        $basePrice = $this->faker->randomElement([
            49.99, 99.99, 149.99, 199.99, 299.99,
            399.99, 499.99, 699.99, 899.99, 1299.99
        ]);

        return [
            'name' => $name,
            'description' => $this->faker->paragraph,
            'price' => $basePrice,
            'stock' => $this->faker->numberBetween(0, 100),
            'sku' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{3}-[A-Z0-9]{4}'),
        ];
    }

    public function lowStock(): self
    {
        return $this->state(fn (array $attributes) => [
            'stock' => $this->faker->numberBetween(0, 5),
        ]);
    }

    public function outOfStock(): self
    {
        return $this->state(fn (array $attributes) => [
            'stock' => 0,
        ]);
    }

    public function highStock(): self
    {
        return $this->state(fn (array $attributes) => [
            'stock' => $this->faker->numberBetween(50, 200),
        ]);
    }
}

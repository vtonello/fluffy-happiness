<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'is_billing' => false,
            'is_shipping' => false,
        ];
    }

    public function billing(): self
    {
        return $this->state(fn (array $attributes) => [
            'is_billing' => true,
        ]);
    }

    public function shipping(): self
    {
        return $this->state(fn (array $attributes) => [
            'is_shipping' => true,
        ]);
    }
}

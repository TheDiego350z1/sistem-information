<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->word(),
            "slug" => $this->faker->slug(),
            "price" => $this->faker->randomFloat(2, 10, 1000), // Random price between 10 and 1000
            "description" => $this->faker->paragraph(), // Random description
            "provider_id" => rand(1, 50), // Associate with a provider
        ];
    }
}

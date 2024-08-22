<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posting>
 */
class PostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['Clothing', 'Electronics', 'Furniture', 'Books', 'Toys']),
            'brand' => $this->faker->company(),
            'location' => $this->faker->city(),
            'price' => $this->faker->randomFloat(2, 10, 500), // Generate a random price between $10 and $500 with 2 decimal places
            'color' => $this->faker->colorName(),
            'description' => $this->faker->paragraph(3),
        ];
    }

}

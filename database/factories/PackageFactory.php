<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'name' => fake()->words(3, true),
        'destination' => fake()->city(),
        'duration' => fake()->numberBetween(1, 10),
        'price' => fake()->randomFloat(2, 100, 10000),
        'total_seats' => fake()->numberBetween(10, 50),
        'description' => fake()->sentence(),
    ];
}
}

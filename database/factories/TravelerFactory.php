<?php

namespace Database\Factories;

use App\Models\Traveler;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Traveler>
 */
class TravelerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'phone' => fake()->phoneNumber(),
        'address' => fake()->address(),
    ];
}
}

<?php

namespace Database\Factories;

use App\Models\Itinery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Factory<Itinery>
 */
class ItineryFactory extends Factory
{
    use HasFactory;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    'package_id' => \App\Models\Package::factory(),
    'day' => fake()->numberBetween(1, 7),
    'activity' => fake()->sentence(),
    'location' => fake()->city(),
];
    }
}

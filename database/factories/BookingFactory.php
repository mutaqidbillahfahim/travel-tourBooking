<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    use HasFactory;
     protected $model = Booking::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'traveler_id' => \App\Models\Traveler::factory(),
            'package_id' => \App\Models\Package::factory(),
            'booking_date' => fake()->date(),
            'number_of_seats' => fake()->numberBetween(1, 5),
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}

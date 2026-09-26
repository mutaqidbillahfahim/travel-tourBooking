<?php

namespace Database\Seeders;
use App\Models\Traveler;
use App\Models\Package;
use App\Models\Booking;
use App\Models\Itinery;

// use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
         Traveler::factory(10)->create();

        Package::factory(5)->create();

        Booking::factory(15)->create();

        Itinery::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

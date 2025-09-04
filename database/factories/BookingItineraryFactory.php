<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingItinerary>
 */
class BookingItineraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => \App\Models\Booking::factory(),
            'title' => fake()->sentence(3),
            'day_number' => fake()->numberBetween(1, 14),
            'time_of_day' => fake()->randomElement(['morning', 'afternoon', 'evening', 'full_day']),
            'description' => fake()->paragraph(2),
            'location' => fake()->city() . ', ' . fake()->country(),
        ];
    }
}

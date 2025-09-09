<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('+1 day', '+6 months');
        $endDate = fake()->dateTimeBetween($startDate, $startDate->format('Y-m-d').' +14 days');

        return [
            'user_id' => \App\Models\User::factory(),
            'guide_id' => \App\Models\Guide::factory(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'number_of_people' => fake()->numberBetween(1, 10),
            'total_price' => fake()->randomFloat(2, 500, 5000),
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
            'payment_status' => fake()->randomElement(['unpaid', 'paid', 'refunded', 'partial']),
            'special_requests' => fake()->optional()->paragraph(),
        ];
    }
}

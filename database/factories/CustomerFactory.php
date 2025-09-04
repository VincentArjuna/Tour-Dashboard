<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'date_of_birth' => fake()->date('Y-m-d', '-18 years'),
            'identity_type' => fake()->randomElement(['passport', 'id_card', 'driver_license']),
            'identity_number' => fake()->bothify('??########'),
            'special_needs' => fake()->optional()->sentence(),
        ];
    }
}

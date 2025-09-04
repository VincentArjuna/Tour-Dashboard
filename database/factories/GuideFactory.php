<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guide>
 */
class GuideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'identity_type' => fake()->randomElement(['passport', 'id_card', 'driver_license']),
            'identity_number' => fake()->bothify('??########'),
            'name' => fake()->name(),
            'date_of_birth' => fake()->date('Y-m-d', '-25 years'),
            'bio' => fake()->paragraph(3),
            'languages' => fake()->randomElements(['English', 'Spanish', 'French', 'German', 'Italian', 'Portuguese'], rand(1, 3)),
        ];
    }
}

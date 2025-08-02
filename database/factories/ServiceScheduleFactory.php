<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceSchedule>
 */
class ServiceScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->optional()->paragraph(),
            'type' => fake()->randomElement(['sunday', 'group', 'youth', 'children', 'womens', 'mens', 'elderly']),
            'location' => fake()->optional()->randomElement(['Main Sanctuary', 'Fellowship Hall', 'Youth Room', 'Prayer Room']),
            'scheduled_at' => fake()->dateTimeBetween('now', '+3 months'),
            'is_active' => fake()->boolean(80),
        ];
    }
}
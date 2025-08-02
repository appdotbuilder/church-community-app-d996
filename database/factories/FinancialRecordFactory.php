<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinancialRecord>
 */
class FinancialRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->sentence(4),
            'amount' => fake()->numberBetween(100000, 10000000), // IDR amounts
            'type' => fake()->randomElement(['offering', 'special_envelope', 'donation']),
            'receipt_date' => fake()->dateTimeBetween('-6 months', 'now'),
            'donor_name' => fake()->optional(0.6)->name(),
            'notes' => fake()->optional()->sentence(),
            'is_published' => fake()->boolean(90),
        ];
    }
}
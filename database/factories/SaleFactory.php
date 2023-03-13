<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sale_date' => fake()->dateTimeBetween('-5 years', now()),
            'total_sale' => rand(100, 1000),
            'employee_id' => rand(1, 5),
        ];
    }
}

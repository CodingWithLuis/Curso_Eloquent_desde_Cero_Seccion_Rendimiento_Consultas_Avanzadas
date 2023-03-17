<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            // 'user_id' => fake()->optional()->randomElement(User::pluck('id')),
            'user_id' => rand(1, 5),
            'task_id' => rand(1, 5),
            'is_active' => rand(0, 1),
        ];
    }
}

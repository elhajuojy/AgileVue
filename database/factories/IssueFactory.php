<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => 1,
            'sprint_id' => 12,
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'status' => fake()->randomElement(['todo', 'in_progress', 'done',"blocked"]),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'type' => fake()->randomElement(['bug', 'feature', 'task']),
            'assignee' => fake()->name(),
            'reporter' => fake()->name(),
            'epic' => fake()->sentence(),
            'story_points' => fake()->randomDigit(),
            'time_estimate' => fake()->randomDigit(),
            'time_spent' => fake()->randomDigit(),
            'time_remaining' => fake()->randomDigit(),
            'resolution' => fake()->randomElement(['fixed', 'wont_fix', 'duplicate', 'incomplete', 'cant_reproduce', 'done']),
            'resolution_date' => fake()->dateTimeBetween('-1 week', 'now'),
            'due_date' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'created'=>fake()->dateTimeBetween('-1 week', 'now'),
            'updated'=>fake()->dateTimeBetween('-1 week', 'now'),
            'labels' => fake()->randomElement(['bug', 'feature', 'task']),
            'components' => fake()->randomElement(['bug', 'feature', 'task']),
        ];
    }
}

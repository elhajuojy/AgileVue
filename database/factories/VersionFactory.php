<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Version>
 */
class VersionFactory extends Factory
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
            "name" => $this->faker->name,
            "description" => $this->faker->text,
            "project_id" => $this->faker->numberBetween(1, 10),
            "created_at" => $this->faker->dateTimeBetween('-1 years', 'now'),
            "updated_at" => $this->faker->dateTimeBetween('-1 years', 'now'),
            "start_date" => $this->faker->dateTimeBetween('-1 years', 'now'),
            "end_date" => $this->faker->dateTimeBetween('-1 years', 'now'),
            "status" => $this->faker->randomElement(['open', 'closed']),
            "type" => $this->faker->randomElement(['release', 'sprint']),
            "archived" => $this->faker->boolean,
            "release_date" => $this->faker->dateTimeBetween('-1 years', 'now'),


        ];
    }
}

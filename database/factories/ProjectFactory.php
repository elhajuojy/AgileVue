<?php

namespace Database\Factories;

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
            //
            'user_id'=>1,
            'name'=>$this->faker->name,
            'description'=>$this->faker->text,
            'project_key'=>$this->faker->name,
            'project_type'=>$this->faker->name,
            'project_avatar'=>'https://api.dicebear.com/6.x/initials/svg?seed='.$this->faker->name,
            'project_cover'=>'https://api.dicebear.com/6.x/initials/svg?seed='.$this->faker->name,
            'project_lead'=>'',
            'project_url'=>$this->faker->url





        ];
    }
}

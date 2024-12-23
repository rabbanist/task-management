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
            'name' => $this->faker->sentence(3),
            'project_code' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'manager_id' => $this->faker->randomElement(\App\Models\User::where('role', 'manager')->pluck('id')->toArray()),  
        ];
    }
}

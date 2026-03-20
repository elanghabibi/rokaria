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
            //
            'user_id' => User::pluck('id')->random(),
            'title' => fake()->sentence(),
            'image' => 'project/cIF5RnBnEhyBxemK7AQI9Sfey7yzxAdK1kz42qMF.jpg',
            'description' => fake()->text(),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected'])
        ];
    }
}

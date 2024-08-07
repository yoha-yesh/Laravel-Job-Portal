<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaraJobs>
 */
class LaraJobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>fake()->sentence(),
            'tags' =>'Laravel, Api, Backend',
            'location' =>fake()->city(),
            'company'=>fake()->company(),
            'website'=>fake()->url(),
            'email'=>fake()->companyEmail(),
            'description'=>fake()->paragraph(5),
        ];
    }
}

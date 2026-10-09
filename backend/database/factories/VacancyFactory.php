<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'company_name' => fake()->company(),
            'location' => fake()->city(),
            'job_type' => fake()->randomElement(['Full-Time', 'Part-Time', 'Kontrak', 'Intern']),
            'description' => fake()->paragraphs(3, true),
            'position' => fake()->randomElement(['Frontend Developer', 'Backend Developer', 'Product Engineer']),
            'candidates_needed' => fake()->numberBetween(1, 10),
            'active_until' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'is_remote' => fake()->boolean(),
            'salary_min' => fake()->numberBetween(5000000, 10000000),
            'salary_max' => fake()->numberBetween(11000000, 20000000),
            'show_salary' => fake()->boolean(),
            'experience_required' => fake()->randomElement(['Kurang dari 1 tahun', '1-3 tahun', '4-5 tahun'])
        ];
    }
}

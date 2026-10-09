<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Vacancy;

class VacancyApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_vacancies()
    {
        Vacancy::factory()->count(3)->create();
        $response = $this->getJson('/api/vacancies');
        $response->assertStatus(200)->assertJsonCount(3, 'data');
    }

    public function test_can_search_vacancies()
    {
        Vacancy::factory()->create(['title' => 'Frontend Developer']);
        Vacancy::factory()->create(['title' => 'Backend Developer']);
        
        $response = $this->getJson('/api/vacancies?search=Frontend');
        $response->assertStatus(200)
                 ->assertJsonCount(1, 'data')
                 ->assertJsonFragment(['title' => 'Frontend Developer']);
    }

    public function test_can_create_vacancy()
    {
        $data = [
            'title' => 'Software Engineer',
            'company_name' => 'Dicoding Indonesia',
            'location' => 'Bandung',
            'job_type' => 'Full-Time',
            'description' => 'Test Description',
            'position' => 'Backend Developer',
            'candidates_needed' => 2,
            'active_until' => '2027-01-01',
            'is_remote' => 'on',
            'salary_min' => 5000000,
            'salary_max' => 10000000,
            'show_salary' => 'on',
            'experience_required' => '1-3 tahun'
        ];

        $response = $this->postJson('/api/vacancies', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('vacancies', ['title' => 'Software Engineer']);
    }

    public function test_can_show_vacancy()
    {
        $vacancy = Vacancy::factory()->create();
        $response = $this->getJson('/api/vacancies/' . $vacancy->id);
        $response->assertStatus(200)->assertJsonFragment(['title' => $vacancy->title]);
    }
}

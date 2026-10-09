<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Vacancy;

class VacancyTest extends TestCase
{
    /**
     * Test that the Vacancy model has the correct fillable properties.
     */
    public function test_vacancy_has_correct_fillable_attributes()
    {
        $vacancy = new Vacancy();

        $expectedFillables = [
            'title',
            'company_name',
            'location',
            'job_type',
            'description',
            'position',
            'candidates_needed',
            'active_until',
            'is_remote',
            'salary_min',
            'salary_max',
            'show_salary',
            'experience_required'
        ];

        $this->assertEquals($expectedFillables, $vacancy->getFillable());
    }

    /**
     * Test that the Vacancy model casts boolean fields correctly.
     */
    public function test_vacancy_casts_boolean_fields()
    {
        $vacancy = new Vacancy([
            'is_remote' => 1,
            'show_salary' => '0',
        ]);

        $this->assertTrue($vacancy->is_remote);
        $this->assertFalse($vacancy->show_salary);
    }
}

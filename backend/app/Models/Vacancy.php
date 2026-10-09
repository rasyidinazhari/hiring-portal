<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
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

    protected $casts = [
        'is_remote' => 'boolean',
        'show_salary' => 'boolean',
        'active_until' => 'date'
    ];
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacancyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        // Parse checkboxes/toggles from frontend ('on' to true, null to false)
        $this->merge([
            'is_remote' => $this->has('is_remote') && $this->is_remote === 'on',
            'show_salary' => $this->has('show_salary') && $this->show_salary === 'on',
            // Default company_name since it's not in the form
            'company_name' => $this->input('company_name', 'Dicoding Indonesia'),
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|in:Full-Time,Part-Time,Kontrak,Intern',
            'description' => 'required|string',
            'position' => 'required|string|max:255',
            'candidates_needed' => 'required|integer|min:1',
            'active_until' => 'required|date',
            'is_remote' => 'boolean',
            'salary_min' => 'required|integer|min:0',
            'salary_max' => 'nullable|integer|gte:salary_min',
            'show_salary' => 'boolean',
            'experience_required' => 'required|string'
        ];
    }
}

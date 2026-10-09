<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacancy;
use Carbon\Carbon;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = Carbon::create(2023, 12, 15, 10, 0, 0);
        $activeUntil = Carbon::create(2023, 12, 30, 23, 59, 59);

        $commonData = [
            'company_name' => 'Dicoding Indonesia',
            'job_type' => 'Full-time',
            'location' => 'Bandung',
            'description' => "Deskripsi Pekerjaan\nSebagai [Posisi Lowongan], Anda akan berpartisipasi dalam proses pembangunan aplikasi yang sedang dibangun dalam perusahaan Dicoding Indonesia. Anda juga diharapkan mampu bekerja dalam tim.\n\nTanggung Jawab\n• Membuat atau memodifikasi program yang sudah ada.\n• Bertanggung jawab dalam mengelola program.",
            'position' => 'Developer',
            'candidates_needed' => 1,
            'is_remote' => false,
            'show_salary' => false,
            'salary_min' => 5000000,
            'salary_max' => 10000000,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
            'active_until' => $activeUntil,
        ];

        Vacancy::create(array_merge($commonData, [
            'title' => 'Product Engineer',
            'experience_required' => '1-3 tahun',
        ]));

        Vacancy::create(array_merge($commonData, [
            'title' => 'Android Engineer',
            'experience_required' => '4-5 tahun',
        ]));

        Vacancy::create(array_merge($commonData, [
            'title' => 'iOS Developer',
            'experience_required' => '1-3 tahun',
        ]));

        Vacancy::create(array_merge($commonData, [
            'title' => 'Code Reviewer',
            'experience_required' => 'Kurang dari 1 tahun',
        ]));
    }
}

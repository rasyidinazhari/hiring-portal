<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('position')->nullable();
            $table->integer('candidates_needed')->nullable();
            $table->date('active_until')->nullable();
            $table->boolean('is_remote')->default(false);
            $table->bigInteger('salary_min')->nullable();
            $table->bigInteger('salary_max')->nullable();
            $table->boolean('show_salary')->default(false);
            $table->string('experience_required')->nullable();
            
            // drop old unused columns if possible, but sqlite doesn't fully support dropping multiple columns easily in some older versions. Laravel handles it though.
            $table->dropColumn('salary');
            $table->dropColumn('requirements');
        });
    }

    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('salary')->nullable();
            $table->text('requirements')->nullable();
            
            $table->dropColumn([
                'position',
                'candidates_needed',
                'active_until',
                'is_remote',
                'salary_min',
                'salary_max',
                'show_salary',
                'experience_required'
            ]);
        });
    }
};

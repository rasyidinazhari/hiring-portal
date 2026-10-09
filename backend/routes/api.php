<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;

Route::apiResource('vacancies', VacancyController::class);

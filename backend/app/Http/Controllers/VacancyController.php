<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Models\Vacancy;

class VacancyController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $query = Vacancy::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = '%' . $request->search . '%';
            $query->where('title', 'like', $searchTerm);
        }

        $vacancies = $query->latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $vacancies
        ]);
    }

    public function store(StoreVacancyRequest $request)
    {
        $vacancy = Vacancy::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Vacancy created successfully',
            'data' => $vacancy
        ], 201);
    }

    public function show(Vacancy $vacancy)
    {
        return response()->json([
            'status' => 'success',
            'data' => $vacancy
        ]);
    }

    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        $vacancy->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Vacancy updated successfully',
            'data' => $vacancy
        ]);
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return response()->json(null, 204);
    }
}

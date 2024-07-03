<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeStoreRequest;
use App\Http\Requests\GradeUpdateRequest;
use App\Http\Resources\GradeLecturesResource;
use App\Http\Resources\GradeListCollection;
use App\Http\Resources\GradeResource;
use App\Models\Grade;
use App\Services\GradeDeleteService;
use App\Services\GradeStoreService;
use App\Services\GradeUpdateService;
use Illuminate\Http\JsonResponse;

class GradeController extends Controller
{
    public function index(): GradeListCollection
    {
        return GradeListCollection::make(Grade::get());
    }

    public function store(GradeStoreRequest $request, GradeStoreService $service): JsonResponse
    {
        return $service->create($request->validated());
    }

    public function show(string $id): GradeResource
    {
        return GradeResource::make(Grade::with('students')->findOrFail($id));
    }

    public function get(string $id): GradeLecturesResource
    {
        return GradeLecturesResource::make(Grade::with('gradeLectures')->findOrFail($id));
    }

    public function update(GradeUpdateRequest $request, Grade $grade, GradeUpdateService $service): JsonResponse
    {
        return $service->change($request->validated(), $grade);
    }

    public function destroy(string $id, GradeDeleteService $service): JsonResponse
    {
        return $service->punish($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Http\Resources\StudentListCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Services\StudentDeleteService;
use App\Services\StudentStoreService;
use App\Services\StudentUpdateService;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    public function index(): StudentListCollection
    {
        return StudentListCollection::make(Student::orderBy('grade_id')->get());
    }

    public function store(StudentStoreRequest $request, StudentStoreService $service): JsonResponse
    {
        return $service->create($request->validated());
    }

    public function show(string $id): StudentResource
    {
        return StudentResource::make(Student::with(['grade', 'classLectures'])->findOrFail($id));
    }

    public function update(StudentUpdateRequest $request, Student $student, StudentUpdateService $service): JsonResponse
    {
        return $service->change($request->validated(), $student);
    }

    public function destroy(string $id, StudentDeleteService $service): JsonResponse
    {
        return $service->punish($id);
    }
}

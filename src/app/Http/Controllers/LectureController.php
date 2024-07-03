<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureStoreRequest;
use App\Http\Requests\LectureUpdateRequest;
use App\Http\Resources\LectureListCollection;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use App\Services\LectureDeleteService;
use App\Services\LectureStoreService;
use App\Services\LectureUpdateService;
use Illuminate\Http\JsonResponse;

class LectureController extends Controller
{

    public function index(): LectureListCollection
    {
        return LectureListCollection::make(Lecture::get());
    }

    public function store(LectureStoreRequest $request, LectureStoreService $service): JsonResponse
    {
        return $service->create($request->validated());
    }

    public function show(string $id): LectureResource
    {
        return LectureResource::make(Lecture::with('grades.students')->findOrFail($id));
    }

    public function update(LectureUpdateRequest $request, Lecture $lecture, LectureUpdateService $service): JsonResponse
    {
        return $service->change($request->validated(), $lecture);
    }

    public function destroy(string $id, LectureDeleteService $service): JsonResponse
    {
        return $service->punish($id);
    }
}

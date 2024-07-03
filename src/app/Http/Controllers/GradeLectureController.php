<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeLectureStoreRequest;
use App\Http\Requests\GradeLectureUpdateRequest;
use App\Services\GradeLectureStoreService;
use App\Services\GradeLectureUpdateService;
use Illuminate\Http\JsonResponse;


class GradeLectureController extends Controller
{
    public function store(GradeLectureStoreRequest $request, GradeLectureStoreService $service): JsonResponse
    {
        return $service->create($request->validated());
    }

    public function update(GradeLectureUpdateRequest $request, string $id, GradeLectureUpdateService $service)
    {
        return $service->change($request->validated(), $id);
    }
}

<?php

namespace App\Services;

use App\Models\Lecture;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;

class LectureStoreService
{
    use HttpResponsesTrait;

    public function create(array $data): JsonResponse
    {
        try {
            Lecture::create($data);
            return $this->success("Лекция создана");
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}

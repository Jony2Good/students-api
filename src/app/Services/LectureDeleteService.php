<?php

namespace App\Services;

use App\Models\Lecture;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;

class LectureDeleteService
{
    use HttpResponsesTrait;

    public function punish(string $id): JsonResponse
    {
        try {
            $lecture = Lecture::findOrFail($id);
            $lecture->delete();
            return $this->success("Запись о лекции удалена");
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}

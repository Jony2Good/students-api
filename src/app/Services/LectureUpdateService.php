<?php

namespace App\Services;

use App\Models\Lecture;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;

class LectureUpdateService
{
    use HttpResponsesTrait;

    public function change(array $data, Lecture $lecture): JsonResponse
    {
        try {
            $lecture->update([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
            return $this->success("Информация о лекции обновлена");
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}

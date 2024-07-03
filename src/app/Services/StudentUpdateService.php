<?php

namespace App\Services;

use App\Models\Student;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;

class StudentUpdateService
{
    use HttpResponsesTrait;

    public function change(array $data, Student $student): JsonResponse
    {
        try {
            $student->update([
                'name' => $data['name'],
                'grade_id' => $data['grade_id'],
            ]);
            return $this->success("Данные студента обновлены");
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}

<?php

namespace App\Services;

use App\Models\Student;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;

class StudentDeleteService
{
    use HttpResponsesTrait;

    public function punish(string $id): JsonResponse
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return $this->success("Запись студента удалена");
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}

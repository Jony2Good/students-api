<?php

namespace App\Services;

use App\Models\Student;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;

class StudentStoreService
{
    use HttpResponsesTrait;

    public function create(array $data): JsonResponse
    {
        try {
            Student::create($data);
            return $this->success("Студент создан");
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}

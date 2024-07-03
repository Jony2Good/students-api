<?php

namespace App\Services;

use App\Models\Grade;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;

class GradeStoreService
{
    use HttpResponsesTrait;

    public function create(array $data): JsonResponse
    {
        try {
            Grade::create($data);
            return $this->success("Класс создан");
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}

<?php

namespace App\Services;

use App\Models\Grade;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;

class GradeDeleteService
{
    use HttpResponsesTrait;

    public function punish(string $id): JsonResponse
    {
        try {
            $grade = Grade::findOrFail($id);
            $grade->delete();
            return $this->success("Запись о классе удалена");
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}

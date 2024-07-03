<?php

namespace App\Services;

use App\Models\Grade;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;

class GradeUpdateService
{
    use HttpResponsesTrait;

    public function change(array $data, Grade $grade): JsonResponse
    {
        try {
            $grade->update([
                'name' => $data['name'],
            ]);
            return $this->success("Информация о классе обновлена");
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}

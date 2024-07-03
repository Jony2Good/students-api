<?php

namespace App\Services;

use App\Models\GradeLecture;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GradeLectureUpdateService
{
    use HttpResponsesTrait;

    public function change(array $data, string $id): JsonResponse
    {
        try {
            DB::transaction(function () use ($id, $data) {
                GradeLecture::where('grade_id', $id)->delete();
                foreach ($data['gradeLectures'] as $lecture) {
                    GradeLecture::create([
                        'grade_id' => $id,
                        'lecture_id' => $lecture['lecture_id'],
                        'curriculum' => $id,
                    ]);
                }
            });
            return $this->success('Обновлен учебный план');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Ошибка при обновлении данных в grade_lectures: ' . $e->getMessage());
            return $this->error($e->getMessage());
        }
    }
}

<?php

namespace App\Services;

use App\Models\GradeLecture;
use App\Traits\HttpResponsesTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GradeLectureStoreService
{
    use HttpResponsesTrait;

    public function create(array $data): JsonResponse
    {
        DB::beginTransaction();
        try {
            foreach ($data['gradeLectures'] as $lecture) {
                GradeLecture::create([
                    'grade_id' => $data['grade_id'],
                    'curriculum' => $data['curriculum'],
                    'lecture_id' => $lecture['lecture_id'],
                ]);
            }
            DB::commit();
            return $this->success('Учебный план создан');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Ошибка при сохранении данных в grade_lectures: ' . $e->getMessage());
            return $this->error($e->getMessage());
        }
    }
}

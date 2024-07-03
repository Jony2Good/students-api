<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HttpResponsesTrait
{
    protected function success($message = null, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Запрос обработан успешно',
            'message' => $message
        ], $code);
    }

    protected function error($message = null, $code = 500): JsonResponse
    {
        return response()->json([
            'status' => 'Ошибка в запросе',
            'message' => $message,
        ], $code);
    }
}

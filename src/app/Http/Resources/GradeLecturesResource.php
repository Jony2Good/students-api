<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GradeLecturesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'gradeLectures' => $this->gradeLectures->map(function($lecture) {
                return [
                    'lecture_id' => $lecture->lecture_id
                ];
            })
        ];
    }
}

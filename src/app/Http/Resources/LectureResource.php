<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
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
            'description' => $this->description,
            'grades' => $this->grades->map(function ($grade) {
                return [
                    'name' => $grade->name,
                    'students' => $grade->students->map(function ($student) {
                        return [
                            'name' => $student->name,
                            'email' => $student->email,
                        ];
                    }),
                ];
            }),
        ];
    }
}

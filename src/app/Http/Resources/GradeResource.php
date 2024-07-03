<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GradeResource extends JsonResource
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
            'students' => $this->students->map(function ($student) {
                return [
                    'name' => $student->name,
                    'email' => $student->email,
                ];
            }),
        ];
    }
}

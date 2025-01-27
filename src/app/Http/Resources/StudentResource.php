<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'email' => $this->email,
            'class' => $this->grade->name ?? null,
            'lectures' => $this->classLectures->map(function ($lecture) {
                return [
                    'name' => $lecture->name,
                    'description' => $lecture->description,
                ];
            }),
        ];
    }
}

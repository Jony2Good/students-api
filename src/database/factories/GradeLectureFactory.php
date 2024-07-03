<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GradeLecture>
 */
class GradeLectureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grade_id' => Grade::factory(),
            'lecture_id' => Lecture::factory(),
            'curriculum' => $this->faker->numberBetween(1, 10),
        ];
    }
}

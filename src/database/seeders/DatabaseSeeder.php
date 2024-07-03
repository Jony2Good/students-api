<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Grade;
use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $grades = Grade::factory(10)->create();
        $lectures = Lecture::factory(20)->create();

        Student::factory(100)->create();

        foreach ($grades as $grade) {
            $shuffledLectures = $lectures->shuffle()->take(10);
           foreach ($shuffledLectures as $lecture) {
                DB::table('grade_lectures')->insert([
                    'grade_id' => $grade->id,
                    'lecture_id' => $lecture->id,
                    'curriculum' => $grade->id,
                ]);
            }
        }
    }
}

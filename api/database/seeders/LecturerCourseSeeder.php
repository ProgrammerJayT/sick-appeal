<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\LecturerCourse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LecturerCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $lecturers = Lecturer::all();

        foreach ($lecturers as $lecturer) {
            LecturerCourse::create([
                'lecturer_id' => $lecturer->lecturer_id,
                'course_id' => Course::all()->random()->getKey(),
                'year' => fake()->dateTimeThisYear()->format('Y')
            ]);
        }
    }
}

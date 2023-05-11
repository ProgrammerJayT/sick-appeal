<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $students = Student::all();

        foreach ($students as $student) {
            StudentCourse::create([
                'student_id' => $student->student_id,
                'course_id' => Course::all()->random()->getKey(),
                'year' => fake()->dateTimeThisYear()->format('Y')
            ]);
        }
    }
}

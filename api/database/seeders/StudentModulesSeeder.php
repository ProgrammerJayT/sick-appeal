<?php

namespace Database\Seeders;

use App\Models\CourseModule;
use App\Models\LecturerModule;
use App\Models\Registration;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\StudentModule;
use App\Models\StudentRegistration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach (Student::all() as $student) {
            $thisYear = now()->format('Y');
            $studentCourse = StudentCourse::where('year', $thisYear)->where('student_id', $student->student_id)->first();

            foreach (CourseModule::where('course_id', $studentCourse->course_id)->get() as $module) {
                $lecturer = LecturerModule::where('module_id', $module->module_id)->get();

                StudentModule::create([
                    'student_id' => $student->student_id,
                    'module_id' => $module->module_id,
                    'lecturer_id' => count($lecturer) > 0 ? $lecturer->random()->lecturer_id : 0,
                    'year' => $thisYear
                ]);
            }
        }
    }
}

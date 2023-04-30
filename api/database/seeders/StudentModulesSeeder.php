<?php

namespace Database\Seeders;

use App\Models\CourseModule;
use App\Models\LecturerModule;
use App\Models\Registration;
use App\Models\Student;
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
        $thisYear = now()->format('Y');
        foreach (Student::all() as $student) {
            $studentRegistration = StudentRegistration::where('student_id', $student->student_id)->first();
            $registration = Registration::find($studentRegistration->registration_id);

            foreach (CourseModule::where('course_id', $registration->course_id)->get() as $module) {

                StudentModule::create([
                    'student_id' => $student->student_id,
                    'module_id' => $module->module_id,
                    'year' => $registration->year
                ]);
            }
        }
    }
}
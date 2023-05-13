<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\CourseModule;
use App\Models\LecturerCourse;
use App\Models\LecturerModule;
use App\Models\LecturerRegistration;
use App\Models\Registration;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LecturerModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach (Lecturer::all() as $lecturer) {
            $lecturerCourse = LecturerCourse::where('lecturer_id', $lecturer->lecturer_id)->first();
            $modules = CourseModule::where('course_id', $lecturerCourse->course_id)->get();

            $count = 0;
            $randModules = array();

            while ($count != 2) {
                $randModule = $modules->random()->module_id;
                !in_array($randModule, $randModules) ? [$randModules[] = $randModule, $count++] : null;
            }

            for ($i = 0; $i < 2; $i++) {
                LecturerModule::create([
                    'lecturer_id' => $lecturer->lecturer_id,
                    'module_id' => $randModules[$i],
                    'year' => $lecturerCourse->year
                ]);
            }
        }
    }
}

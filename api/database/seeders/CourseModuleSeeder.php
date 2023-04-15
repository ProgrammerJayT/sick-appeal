<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseModule;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $modules = Module::all();
        $courses = Course::all();

        for ($i = 0; $i < count($courses); $i++) {
            $numCourses = rand(0, count($modules));

            for ($j = 0; $j < $numCourses; $j++) {
                CourseModule::create([
                    'course_id' => $courses->random()->getKey(),
                    'module_id' => $modules->random()->getKey()
                ]);
            }
        }
    }
}
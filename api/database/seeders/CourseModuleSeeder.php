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

        foreach ($courses as $course) {
            $numModules = rand(5, 10);

            for ($i = 0; $i < $numModules; $i++) {
                CourseModule::create([
                    'course_id' => $course->course_id,
                    'module_id' => $this->checkModuleExist($modules->random()->getKey(), $course->course_id)
                ]);
            }
        }
    }

    public function checkModuleExist($module_id, $course_id)
    {
        $exists = CourseModule::where('course_id', $course_id)->where('module_id', $module_id)->first();
        return $exists ? $this->getNewModule($module_id) : $module_id;
    }

    public function getNewModule($id)
    {
        $newModule = Module::where('module_id', $id)->get()->random()->getKey();
        return $newModule;
    }
}
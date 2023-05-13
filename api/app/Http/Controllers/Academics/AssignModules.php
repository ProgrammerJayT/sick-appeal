<?php

namespace App\Http\Controllers\Academics;

use App\Models\CourseModule;
use Illuminate\Http\Request;
use App\Models\LecturerModule;
use App\Http\Controllers\Controller;

class AssignModules extends Controller
{
    //
    public function generate($data)
    {
        //
        $type = $data['type'];
        $course_id = $data['course_id'];
        $user_id = $data['user_id'];

        $modules = CourseModule::where('course_id', $course_id)->get();

        $count = 0;
        $randModules = array();

        while ($count != 2) {
            $randModule = $modules->random()->module_id;
            !in_array($randModule, $randModules) ? [$randModules[] = $randModule, $count++] : null;
        }

        // for ($i = 0; $i < 2; $i++) {
        //     LecturerModule::create([
        //         'lecturer_id' => $lecturer->lecturer_id,
        //         'module_id' => $randModules[$i],
        //         'year' => $lecturerCourse->year
        //     ]);
        // }
    }
}

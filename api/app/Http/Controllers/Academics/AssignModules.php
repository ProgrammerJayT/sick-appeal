<?php

namespace App\Http\Controllers\Academics;

use App\Models\CourseModule;
use App\Models\StudentModule;
use Illuminate\Http\Request;
use App\Models\LecturerModule;
use App\Http\Controllers\Controller;

class AssignModules extends Controller
{
    public function generate($type, $course_id, $user_id)
    {
        switch ($type) {
            case 'student':
                $userModuleModel = new StudentModule();
                break;

            case 'lecturer':
                $userModuleModel = new LecturerModule();
                break;

            default:
                return; // Exit the method if type is not recognized
        }

        $modules = CourseModule::where('course_id', $course_id)->get();

        $count = 0;
        $randModules = [];

        $numModules = ($type == 'student') ? 4 : 2;

        while ($count < $numModules) {
            $randModule = $modules->random()->module_id;
            if (!in_array($randModule, $randModules)) {
                $randModules[] = $randModule;
                $count++;
            }
        }

        // return $randModules;

        foreach ($randModules as $randModule) {
            $userModuleData = [
                $type . '_id' => $user_id,
                'module_id' => $randModule,
                'year' => now()->format('Y'),
            ];

            if ($type == 'student') {
                $getModuleLecturer = LecturerModule::where('module_id', $randModule)->get()->random();
                $userModuleData['lecturer_id'] = $getModuleLecturer->lecturer_id;
            }

            $newUserModules = $userModuleModel->create($userModuleData);
        }

        return $newUserModules;
    }
}

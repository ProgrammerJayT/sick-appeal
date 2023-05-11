<?php

namespace App\Http\Controllers\Academics;

use App\Http\Resources\LecturerCourseResource;
use App\Http\Resources\ModuleResource;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Models\LecturerCourse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleCollection;
use App\Http\Resources\StudentCourseResource;
use App\Models\LecturerModule;
use App\Models\StudentModule;

class AssignCourses extends Controller
{
    //
    public function loadCourses($user_id, $type)
    {
        //
        switch ($type) {
            case 'student':
                $userCourseModel = new StudentCourse;
                $userCourseModuleModel = new StudentModule;
                $userIdColumn = 'student_id';
                break;

            case 'lecturer':
                $userCourseModel = new LecturerCourse;
                $userCourseModuleModel = new LecturerModule;
                $userIdColumn = 'lecturer_id';
                break;

            default:
                # code...
                break;
        }

        $courses = [];
        $userCourses = $userCourseModel->where($userIdColumn, $user_id)->get();

        foreach ($userCourses as $userCourse) {

            $course = Course::find($userCourse->course_id);
            $courses[] = collect([
                'courseId' => $course->course_id,
                'name' => $course->name,
                'modules' => $this->loadModules($user_id, $userCourseModuleModel, $userIdColumn, $type),
            ]);
        }

        return $courses;
    }

    public function loadModules($user_id, $userCourseModuleModel, $userIdColumn, $type)
    {
        $modules = [];
        $userModules = $userCourseModuleModel->where($userIdColumn, $user_id)->get();

        foreach ($userModules as $userModule) {
            $module = new ModuleResource(Module::find($userModule->module_id));

            $modules[] = collect([
                'moduleId' => $module->module_id,
                'name' => $module->name,
                'code' => $module->code,
            ]);

            if ($type == 'student') {
                $modules[count($modules) - 1]['lecturerId'] = $userModule->lecturer_id;
            }
        }

        return $modules;
    }

    public function loadOne($user_id, $type, $course_id)
    {
        $type == 'lecturer' ? [
            $userCourse = new LecturerCourse
        ] : [
            $userCourse = new StudentCourse
        ];

        try {
            $newUserCourse = $userCourse->create([
                $type . '_id' => $user_id,
                'course_id' => $course_id,
                'year' => now()->format('Y')
            ]);

            return response()->json($type == 'lecturer' ? new LecturerCourseResource($newUserCourse) : new StudentCourseResource($newUserCourse), 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json('Failed to create user course. ' . $th->getMessage(), 409);
        }
    }
}

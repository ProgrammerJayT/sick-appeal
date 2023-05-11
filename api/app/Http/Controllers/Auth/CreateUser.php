<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Academics\AssignModules;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Http\Resources\LecturerResource;
use App\Http\Resources\StudentResource;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\LecturerCourse;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class CreateUser extends Controller
{
    //
    public function create($data)
    {
        $name = $data['name'];
        $surname = $data['surname'];
        $type = $data['type'];
        $user_id = $data['user_id'];
        $account_id = $data['account_id'];
        $course_id = $data['course_id'];

        switch ($type) {
            case 'lecturer':
                $model = new Lecturer;
                $userCourse = new LecturerCourse;
                break;

            case 'student':
                $model = new Student;
                $userCourse = new StudentCourse;
                break;

            case 'admin':
                $model = new Admin;
                break;

            default:
                //Hopefully nothing breaks
                break;
        }

        try {
            $userData = [
                'name' => $name,
                'surname' => $surname,
                'account_id' => $data['account_id'],
            ];

            if ($type != 'admin') {
                $userData[$type . '_id'] = $user_id;
            }

            $newUser = $model->create($userData);

            switch ($type) {
                case 'student':
                    $newUser = new StudentResource(Student::where('account_id', $newUser->account_id)->first());
                    break;

                case 'lecturer':
                    $newUser = new LecturerResource(Lecturer::where('account_id', $newUser->account_id)->first());
                    break;

                case 'admin':
                    $newUser = new AdminResource(Admin::where('account_id', $newUser->account_id)->first());
                    break;

                default:
                    //Hopefully nothing breaks
                    break;
            }

            return response()->json($newUser, 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json('Failed to create user. ' . $th->getMessage(), 422);
        }
    }
}

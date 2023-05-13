<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\LecturerResource;
use App\Http\Resources\StudentResource;
use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;

class CreateUser extends Controller
{
    //
    public function create($data)
    {
        $name = $data['name'];
        $surname = $data['surname'];

        switch ($data['type']) {
            case 'lecturer':
                $model = new Lecturer;
                break;

            case 'student':
                $model = new Student;
                break;

            case 'admin':
                $model = new Admin;
                break;

            default:
                //Hopefully nothing breaks
                break;
        }

        try {
            $newUser = $model->create([
                'name' => $name,
                'surname' => $surname,
                $data['type'] . '_id' => $data['userId'],
                'account_id' => $data['accountId']
            ]);

            return response()->json(
                $data['type'] == 'lecturer' ? new LecturerResource($newUser) : new StudentResource($newUser),
                201
            );
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json('Failed to create user .' . $th->getMessage(), 422);
        }
    }
}

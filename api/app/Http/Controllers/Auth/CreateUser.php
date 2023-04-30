<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\LecturerResource;
use App\Http\Resources\StudentResource;
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

        $model = $data['type'] == 'lecturer' ? new Lecturer : new Student;

        try {
            $newUser = $model->create([
                'name' => $name,
                'surname' => $surname,
                $data['type'] . '_id' => $data['userId'],
                'account_id' => $data['accountId']
            ]);

            return response()->json([
                'user' => $data['type'] == 'lecturer' ? new LecturerResource($newUser) : new StudentResource($newUser),
                'statusCode'  => 201
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'Failed to create user .' . $th->getMessage(), 'statusCode' => 422]);
        }
    }
}

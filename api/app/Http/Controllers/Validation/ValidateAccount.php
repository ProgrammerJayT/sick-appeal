<?php

namespace App\Http\Controllers\Validation;

use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;

class ValidateAccount extends Controller
{
    //
    public function test($request)
    {
        $type = $request->type;
        $userId = $request->userId;

        switch ($type) {
            case 'student':
                $model = new Student;
                break;

            case 'lecturer':
                $model = new Lecturer;
                break;

            case 'admin':
                $model = new Account;
                break;

            default:
                $model = null;
                break;
        }

        if ($model == null) {
            return response()->json('Invalid user type', 404);
        }

        $user = $type == 'admin' ?
            $model->where('email', strtolower($request->name) . '.' . strtolower($request->surname) . '@sick-applications.co.za')->first()
            : $model->find($userId);

        if ($user) {
            return response()->json('User account exists', 403);
        }

        return response()->json('All validations passed', 200);
    }
}

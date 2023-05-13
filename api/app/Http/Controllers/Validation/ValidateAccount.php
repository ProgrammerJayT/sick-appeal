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
        $email = $type == 'admin' ? $userId : $userId . '@tut4life.ac.za';

        $user = Account::where('email', $email)->first();
        if ($user) {
            return response()->json('User account exists', 403);
        }

        return response()->json('All validations passed', 200);
    }
}

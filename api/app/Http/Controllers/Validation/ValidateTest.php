<?php

namespace App\Http\Controllers\Validation;

use App\Http\Controllers\Controller;
use App\Models\LecturerModule;
use App\Models\Test;
use Illuminate\Http\Request;

class ValidateTest extends Controller
{
    //
    public function test($request)
    {
        //
        $lecturer_id = $request->lecturerId;
        $module_id = $request->moduleId;
        $date = $request->date;

        $lecturerModule = LecturerModule::where('lecturer_id', $lecturer_id)->where('module_id', $module_id)->first();

        if (!$lecturerModule) {
            return response()->json('Lecturer not registered for this module', 422);
        }

        $lecturerTests = Test::where('lecturer_id', $lecturer_id)->get();

        foreach ($lecturerTests as $lecturerTest) {
            if ($date == $lecturerTest->date) {
                return response()->json('You already have a test scheduled on ' . $date, 422);
            }
        }

        return response()->json('All validation checks passed', 200);
    }
}

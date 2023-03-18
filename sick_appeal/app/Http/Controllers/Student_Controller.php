<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Student_Controller extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard');
    }

    public function application()
    {
        return view('student.application');
    }

    public function Student_Application(Request $request)
    {
        $this->validate($request,([
            'module_select'=>'required',
            'file_attachment'=>'required',
            'student_reason'=>'required',
        ]));
    }




    public function history()
    {
        return view('student.history');
    }

    public function profile()
    {
        return view('student.profile');
    }

    public function signout()
    {
        return view('student.signout');
    }
}

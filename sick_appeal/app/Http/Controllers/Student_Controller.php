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

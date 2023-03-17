<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Lecture_Controller extends Controller
{
    public function dashboard()
    {
        return view('lecture.dashboard');
    }

    public function profile()
    {
        return view('lecture.profile');
    }

    public function signout()
    {
        return view('lecture.signout');
    }



    public function history()
    {
        return view('lecture.history');
    }

    public function applications()
    {
        return view('lecture.newApps');
    }

    public function application_view()
    {
        return view('lecture.application');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main_Controller extends Controller
{
    public function login_View()
    {
        return view('login');
    }


    public function register_View()
    {
        return view('register');
    }
}

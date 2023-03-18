<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main_Controller extends Controller
{
    public function login_View()
    {
        return view('login');
    }

     public function Login_user(Request $request)
    {
        $this->validate($request,([
            'user_Email'=>'required|email',
            'password'=>'required',
        ]));
    }


    public function register_View()
    {
        return view('register');
    }

    public function Register_user(Request $request)
    {
        $this->validate($request,([
            'name'=>'required',
            'surname'=>'required',
            'student_Number'=>'required',
            'contact_Number'=>'required',
            'user_type'=>'required',
            'user_Email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',

        ]));
    }

}

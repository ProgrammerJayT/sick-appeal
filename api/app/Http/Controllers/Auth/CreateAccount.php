<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CreateAccount extends Controller
{
    //
    public function create($request)
    {
        $type = $request->type;
        $domain = $type == 'admin' ? '@sick-applications.co.za' : '@tut4life.ac.za';
        $name = ucfirst($request->name);
        $surname = ucfirst($request->surname);
        $emailPrefix = $type == 'admin' ? strtolower($name) . '.' . strtolower($surname) : $request->userId;

        $email = $emailPrefix . $domain;

        try {
            $newAccount = Account::create(
                array(
                    'type' => $request->type,
                    'password' => Crypt::encrypt('password'),
                    'email' => $email,
                    'email_verified' => false,
                )
            );

            return response()->json(new AccountResource($newAccount), 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 403);
        }
    }
}

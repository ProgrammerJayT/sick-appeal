<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class CreateAccount extends Controller
{
    //
    public function create(StoreAccountRequest $request)
    {
        $request->email ? $email = $request->email  : $email = $request->userId . '@tut4life.ac.za';
        $email = strtolower($email);
        $status = $request->status; //Account property
        $password = $request->password; //Account property
        $type = $request->type; //Account property
        $status = 'pending';

        $userExists = Account::where('email', $email)->first();

        if ($userExists) {
            return response()->json('User already registered', 409);
        }

        try {
            $newAccount = Account::create(
                array(
                    'type' => $type,
                    'password' => Hash::make($password),
                    'email' => $email,
                    'email_verified' => false,
                    'status' => $status,
                )
            );
            return response()->json(new AccountResource($newAccount), 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 403);
        }
    }
}

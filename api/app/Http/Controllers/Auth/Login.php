<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\AccountResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class Login extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        try {
            $account = Account::where('email', $email)->first();

            if (!$account) {
                return response()->json('Account not found', 404);
            }

            if (!Hash::check($password, $account->password)) {
                return response()->json('Incorrect password', 403);
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        return new AccountResource($account);
    }
}

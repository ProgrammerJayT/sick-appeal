<?php

namespace App\Http\Controllers\Auth;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AccountResource;

class Login extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'type' => 'required|in:student,lecturer,admin',
        ]);

        $email = $request->email;
        $password = $request->password;
        $type = $request->type;

        try {
            $account = Account::where('type', $type)->where('email', $email)->first();

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

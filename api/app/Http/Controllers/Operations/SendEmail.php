<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    //
    public function send($emailObject, $data)
    {
        try {
            //code...
            Mail::to($data['email'])->send(new $emailObject);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json('Failed to send email', 500);
        }
    }
}

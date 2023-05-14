<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Mail\SickTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function send($data)
    {
        $emailObject = null;

        switch ($data['object']) {
            case 'sickTest':
                $emailObject = new SickTest($data['lecturer'], $data['module'], $data['deadline']);
                break;

            default:
                return response()->json('Invalid email object.', 400);
        }

        try {
            Mail::to($data['email'])->send($emailObject);
            return response()->json('Email sent successfully.', 200);
        } catch (\Throwable $th) {
            return response()->json('Failed to send email. ' . $th->getMessage(), 500);
        }
    }
}

<?php

namespace App\Http\Resources;

use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'accountId' => $this->account_id,
            'type' => $this->type,
            'status' => $this->status,
            'email' => $this->email,
            'emailVerified' => $this->email_verified,
            'password' => $this->password,
            'user' => $this->getUser($this->type, $this->account_id),
        );
    }

    public function getUser($type, $accountId)
    {
        switch ($type) {
            case 'student':
                $user = new StudentResource(Student::where('account_id', $accountId)->first());
                break;

            case 'admin':
                $user = new AdminResource(Admin::where('account_id', $accountId)->first());
                break;

            case 'lecturer':
                $user = new LecturerResource(Lecturer::where('account_id', $accountId)->first());
                break;

            default:
                # code...
                break;
        }

        return $user;
    }
}
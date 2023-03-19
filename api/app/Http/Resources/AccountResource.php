<?php

namespace App\Http\Resources;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'role' => $this->role,
            'status' => $this->status,
            'email' => $this->email,
            'emailVerified' => $this->email_verified,
            'user' => $this->getUser($this->role, $this->account_id),
        );
    }

    public function getUser($role, $accountId)
    {
        switch ($role) {
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
                $user = null;
                break;
        }
        return $user == null ? false : $user;
    }
}
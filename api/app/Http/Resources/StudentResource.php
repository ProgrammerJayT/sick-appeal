<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'studentId' => $this->student_id,
            'accountId' => $this->account_id,
            'courseId' => $this->course_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
        );
    }
}
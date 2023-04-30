<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'registrationId' => $this->registration_id,
            'courseId' => $this->course_id,
            'studentId' => $this->student_id,
            'year' => $this->year,
            'status' => $this->status,
        );
    }
}
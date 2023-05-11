<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LecturerCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'lecturerCourseId' => $this->lecturer_course_id,
            'lecturerId' => $this->lecturer_id,
            'courseId' => $this->course_id,
            'year' => $this->year,
        );
    }
}

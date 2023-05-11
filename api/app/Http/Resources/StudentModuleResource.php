<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'studentModuleId' => $this->student_module_id,
            'courseModuleId' => $this->module_id,
            'lecturerId' => $this->lecturer_id,
            'studentId' => $this->student_id,
        );
    }
}
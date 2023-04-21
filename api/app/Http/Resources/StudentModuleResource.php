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
            'studentModuleId' => $this->student_module_id,
            'courseModuleId' => $this->module_id,
            'studentId' => $this->student_id,
        );
    }
}
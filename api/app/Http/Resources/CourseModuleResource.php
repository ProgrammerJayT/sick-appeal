<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ModuleCollection;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\Module;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'courseId' => $this->course_id,
            'moduleId' => $this->module_id
        );
    }
}

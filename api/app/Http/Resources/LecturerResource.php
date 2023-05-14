<?php

namespace App\Http\Resources;

use App\Http\Controllers\Academics\AssignCourses;
use App\Models\Test;
use App\Models\Course;
use App\Models\Module;
use App\Models\Schedule;
use App\Models\CourseModule;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\LecturerCourse;
use App\Models\LecturerModule;
use App\Models\LecturerRegistration;
use App\Http\Resources\TestCollection;
use App\Http\Resources\ScheduleCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class LecturerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //
        $assignCourse = new AssignCourses;

        return array(
            'lecturerId' => $this->lecturer_id,
            'accountId' => $this->account_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'courses' => $assignCourse->loadCourses($this->lecturer_id, 'lecturer'),
        );
    }
}

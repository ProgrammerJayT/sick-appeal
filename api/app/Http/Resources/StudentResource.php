<?php

namespace App\Http\Resources;

use App\Http\Controllers\Academics\AssignCourses;
use App\Http\Controllers\Academics\LoadTimetable;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\Module;
use App\Models\Registration;
use App\Models\StudentRegistration;
use App\Models\StudentTest;
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
        //
        $loadCoursesAndModules = new AssignCourses;
        $loadTimetable = new LoadTimetable;

        return array(
            'studentId' => $this->student_id,
            'accountId' => $this->account_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'courses' => $loadCoursesAndModules->loadCourses($this->student_id, 'student'),
            'classes' => $loadTimetable->load($this->student_id)
        );
    }
}

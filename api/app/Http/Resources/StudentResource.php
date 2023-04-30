<?php

namespace App\Http\Resources;

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
        return array(
            'studentId' => $this->student_id,
            'accountId' => $this->account_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'courses' => $this->loadCourses($this->student_id),
            'tests' => new StudentTestCollection(StudentTest::where('student_id', $this->student_id)->get())
        );
    }

    public function loadCourses($student_id)
    {
        $courses = [];
        $studentRegistrations = StudentRegistration::where('student_id', $student_id)->get();

        foreach ($studentRegistrations as $studentRegistration) {
            $registration = Registration::find($studentRegistration->registration_id);

            $registration ? [$course = Course::find($registration->course_id), $courses[] = collect([
                'courseId' => $course->course_id,
                'name' => $course->name,
                'modules' => $this->loadModules($registration->course_id)
            ])] : null;
        }

        return $courses;
    }

    public function loadModules($course_id)
    {
        $modules = [];
        $courseModules = CourseModule::where('course_id', $course_id)->get();

        foreach ($courseModules as $courseModule) {
            $modules[] = Module::find($courseModule->module_id);
        }

        return new ModuleCollection($modules);
    }

    public function loadTests($student_id)
    {
    }

    // public function loadCourses($)
}

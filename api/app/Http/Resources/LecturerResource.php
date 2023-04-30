<?php

namespace App\Http\Resources;

use App\Models\Test;
use App\Models\Course;
use App\Models\Module;
use App\Models\CourseModule;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\LecturerRegistration;
use App\Http\Resources\TestCollection;
use App\Models\LecturerModule;
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
        return array(
            'lecturerId' => $this->lecturer_id,
            'accountId' => $this->account_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'courses' => $this->loadCourses($this->lecturer_id),
            'tests' => new TestCollection(Test::where('lecturer_id', $this->lecturer_id)->get())
        );
    }

    public function loadCourses($lecturer_id)
    {
        $courses = [];
        $lecturerRegistrations = LecturerRegistration::where('lecturer_id', $lecturer_id)->get();

        foreach ($lecturerRegistrations as $lecturerRegistration) {
            $registration = Registration::find($lecturerRegistration->registration_id);

            $registration ? [$course = Course::find($registration->course_id), $courses[] = collect([
                'courseId' => $course->course_id,
                'name' => $course->name,
                'modules' => $this->loadModules($lecturer_id)
            ])] : null;
        }

        return $courses;
    }

    public function loadModules($lecturer_id)
    {
        $modules = [];
        $lecturerModules = LecturerModule::where('lecturer_id', $lecturer_id)->get();

        foreach ($lecturerModules as $lecturerModule) {
            $modules[] = Module::find($lecturerModule->module_id);
        }

        return new ModuleCollection($modules);
    }
}

<?php

namespace App\Http\Controllers;

use App\Filters\StudentsFilter;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Account;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\Module;
use App\Models\StudentModule;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new StudentsFilter();
        $filterItems = $filter->transform($request);

        return new StudentCollection(Student::where($filterItems)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($data)
    {
        try {
            $newStudent = Student::create(
                array(
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'student_id' => $data['userId'],
                    'account_id' => $data['accountId'],
                )
            );

            $courseModules = CourseModule::where('course_id', $data['courseId'])->get();
            try {
                foreach ($courseModules as $module) {
                    StudentModule::create([
                        'module_id' => $module->module_id,
                        'student_id' => $newStudent->student_id
                    ]);
                }
            } catch (\Throwable $th) {
                //throw $th;
            }

            return new StudentResource($newStudent);
        } catch (\Throwable $th) {

            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        return $student->delete();
    }
}
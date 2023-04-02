<?php

namespace App\Http\Controllers;

use App\Filters\StudentsFilter;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Account;
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

        $includeCourses = $request->query('include_modules');

        $students = Student::where($filterItems);

        if ($includeCourses) {
            $students = $students->with('modules');
        }

        return new StudentCollection($students->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($data)
    {
        try {
            return new StudentResource(
                Student::create(
                    array(
                        'name' => $data['name'],
                        'surname' => $data['surname'],
                        'student_id' => $data['userId'],
                        'account_id' => $data['accountId'],
                    )
                )
            );
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
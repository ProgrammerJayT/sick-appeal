<?php

namespace App\Http\Controllers;

use App\Filters\CoursesFilter;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseCollection;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new CoursesFilter();
        $filterItems = $filter->transform($request);

        $includeCourses = $request->query('include_modules');

        $courses = Course::where($filterItems);

        if ($includeCourses) {
            $courses = $courses->with('modules');
        }

        return new CourseCollection($courses->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        //Get values from POST request
        $name = $request->name;

        //Attempt to create course
        $course = Course::create(
            array(
                'name' => $name
            )
        );

        return new CourseResource($course);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        return $course->delete();
    }
}
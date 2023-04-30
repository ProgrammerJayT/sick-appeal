<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseModuleCollection;
use App\Models\CourseModule;
use App\Http\Requests\StoreCourseModuleRequest;
use App\Http\Requests\UpdateCourseModuleRequest;

class CourseModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return new CourseModuleCollection(CourseModule::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseModuleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseModule $courseModule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseModuleRequest $request, CourseModule $courseModule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseModule $courseModule)
    {
        //
        return $courseModule->delete();
    }
}

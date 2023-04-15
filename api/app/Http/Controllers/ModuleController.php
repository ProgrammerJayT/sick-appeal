<?php

namespace App\Http\Controllers;

use App\Filters\ModulesFilter;
use App\Models\Module;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Http\Resources\ModuleCollection;
use App\Http\Resources\ModuleResource;
use App\Models\Course;
use App\Models\CourseModule;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new ModulesFilter();
        $filterItems = $filter->transform($request);

        return new ModuleCollection(Module::where($filterItems)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModuleRequest $request)
    {
        // Get the course name from the request
        $name = $request->name;
        $code = $request->code;
        $course_id = $request->courseId;

        //First check if the course exists
        $existingCourse = Course::find($course_id);
        if (!$existingCourse) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        // Check if the module already exists in the database
        $existingModule = Module::where('name', $name)->where('code', $code)->first();

        if (!$existingModule) {
            //Since the module doesn't exist, create new one
            $newModule = Module::create([
                'name' => $name,
                'code' => $code
            ]);

            $module = $newModule;

        } else {
            //The module exists, it can be shared, but is it already placed under the requested course?
            $existingCourseModule = CourseModule::where('course_id', $course_id)->where('module_id', $existingModule->module_id)->first();

            //If module already has a course, return error
            if ($existingCourseModule != null) {
                return response()->json(['error' => 'Module already exists'], 409);
            }
        }

        //After creating a new module, add new record to course module entity
        CourseModule::create([
            'course_id' => $course_id,
            'module_id' => $module ?? $existingModule->module_id
        ]);

        return new ModuleResource($module ?? $existingModule);
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
        return new ModuleResource($module);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuleRequest $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        //
    }
}
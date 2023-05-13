<?php

namespace App\Http\Controllers;

use App\Filters\TestsFilter;
use App\Http\Controllers\Mails\NewTest;
use App\Http\Controllers\Validation\ValidateTest;
use App\Http\Resources\TestResource;
use App\Models\Test;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Resources\TestCollection;
use App\Models\Lecturer;
use App\Models\LecturerModule;
use App\Models\Module;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new TestsFilter();
        $filterItems = $filter->transform($request);

        return new TestCollection(Test::where($filterItems)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestRequest $request)
    {
        //
        $validateTest = new ValidateTest;
        $response = $validateTest->test($request);

        if ($response->status() == 422) {
            return response()->json($response->getData(), $response->status());
        }

        $lecturer_id = $request->lecturerId;
        $module_id = $request->moduleId;
        $date = $request->date;
        $time = $request->time;
        $type = $request->type;
        $venue = $request->venue;

        try {
            $newTest = Test::create([
                'lecturer_id' => $lecturer_id,
                'module_id' => $module_id,
                'date' => $date,
                'time' => $time,
                'type' => $type,
                'venue' => $venue
            ]);

            $lecturer = Lecturer::find($newTest->lecturer_id);

            $notifyStudents = new NewTest;
            $notifyStudents->generatePdf([
                'date' => '2023-04-30',
                'lecturer' => $lecturer,
                'time' => $newTest->time,
                'venue' => $newTest->venue,
                'module' => Module::find($newTest->module_id)->name,
                'type' => $newTest->type
            ]);

            return new TestResource($newTest);
        } catch (\Throwable $th) {
            //throw $th;
            $newTest->delete();
            return response()->json('Failed to create test. ' . $th->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
        // return new TestRes
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
        return $test->delete();
    }
}

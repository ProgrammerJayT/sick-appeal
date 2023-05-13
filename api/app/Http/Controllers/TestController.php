<?php

namespace App\Http\Controllers;

use App\Filters\TestsFilter;
use App\Http\Resources\TestResource;
use App\Models\Test;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Resources\TestCollection;
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

        $accounts = Test::where($filterItems)->get();

        return new TestCollection($accounts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestRequest $request)
    {
        //

        try {
            $newTest = Test::create([
                'lecturer_id' => $request->lecturerId,
                'module_id' => $request->moduleId,
                'date' => $request->date,
                'time' => $request->time,
                'type' => $request->type,
                'venue_id' => $request->venueId,
            ]);

            return response()->json(new TestResource($newTest), 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json('Failed to create test. ' . $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
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
    }
}

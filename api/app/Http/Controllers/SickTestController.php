<?php

namespace App\Http\Controllers;

use App\Models\SickTest;
use App\Http\Requests\StoreSickTestRequest;
use App\Http\Requests\UpdateSickTestRequest;
use App\Models\Test;

class SickTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSickTestRequest $request)
    {
        //
        $test = Test::find($request->testId);

        if (!$test) {
            return response()->json('Test not found', 404);
        }

        try {
            $newSickTest = SickTest::create([
                'test_id' => $request->testId,
                'venue_id' => $request->venueId,
                'time' => $request->time,
                'date' => $request->date
            ]);

            return response()->json($newSickTest, 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SickTest $sickTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSickTestRequest $request, SickTest $sickTest)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SickTest $sickTest)
    {
        //
    }
}
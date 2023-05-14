<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Module;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\SickTest;
use App\Models\StudentModule;
use Illuminate\Support\Facades\Mail;
use App\Mail\SickTest as SickTestEmail;
use App\Http\Requests\StoreSickTestRequest;
use App\Http\Requests\UpdateSickTestRequest;
use App\Http\Controllers\Operations\SendEmail;

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

        $sickTest = SickTest::where('test_id', $request->testId)->first();

        if ($sickTest) {
            return response()->json('You already have sick test applications open', 409);
        }

        try {
            $newSickTest = SickTest::create([
                'test_id' => $request->testId,
                'venue_id' => $request->venueId,
                'time' => $request->time,
                'date' => $request->date
            ]);

            $testInformation = Test::find($request->testId);
            $lecturer = Lecturer::find($testInformation->lecturer_id);
            $module = Module::find($testInformation->module_id);
            $deadline = now()->addDays(3)->format('Y-m-d');

            $studentModules = StudentModule::where('module_id', $test->test_id)->get();
            $studentsToEmail = [];
            foreach ($studentModules as $studentModule) {
                $studentsToEmail[] = Student::find($studentModule->student_id);
            }

            return $studentsToEmail;

            Mail::to('theanthem8@gmail.com')->send(new SickTestEmail($lecturer, $module, $deadline));
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

<?php

namespace App\Http\Controllers;

use App\Filters\RegistrationsFilter;
use App\Http\Controllers\Academics\AssignModules;
use App\Models\LecturerRegistration;
use App\Models\Registration;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new RegistrationsFilter();
        $filterItems = $filter->transform($request);

        return new ResourceCollection(Registration::where($filterItems)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($data)
    {
        //
        $type = $data['type'];
        $course_id = $data['courseId'];
        $user_id = $data['userId'];
        $year = now()->format('Y');

        try {
            $newRegistration = Registration::create([
                'course_id' => $course_id,
                'year' => $year,
                'status' => 'registered'
            ]);

            $userRegistration = $type == 'lecturer' ? new LecturerRegistration : new StudentRegistration;

            try {
                $userRegistration->create([
                    $type . '_id' => $user_id,
                    'registration_id' => $newRegistration->registration_id
                ]);

                // $assignModuleData = array();

                // $assignModules = new AssignModules;
                // $assignModulesResponse = $assignModules->generate($assignModuleData);

                return response()->json('Course assigned', 201);
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json($th->getMessage(), 403);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
        if (!$registration) {
            return response()->json('Failed to delete record. Registration not found', 404);
        }

        return $registration->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Filters\SessionsFilter;
use App\Http\Resources\SessionCollection;
use App\Http\Resources\SessionResource;
use App\Models\Session;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\Lecturer;
use App\Models\LecturerModule;
use App\Models\Module;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new SessionsFilter;
        $filterItems = $filter->transform($request);

        $sessions = Session::where($filterItems)->get();
        return new SessionCollection($sessions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSessionRequest $request)
    {
        //
        $lecturer = Lecturer::find($request->lecturerId);
        if (!$lecturer) {
            return response()->json('Lecturer account does not exist', 404);
        }

        $lecturerModules = LecturerModule::where('module_id', $request->moduleId)->get();
        if (!$lecturerModules->count() > 0) {
            return response()->json('Lecturer not enrolled for this module', 403);
        }

        //Check if lecturer has a
        $sessions = Session::where('lecturer_id', $request->lecturerId)->where('status', 'ongoing')->get();
        if ($sessions->count() > 0) {
            return response()->json('You already have a class in progress', 403);
        }

        try {
            $newSession = Session::create([
                'lecturer_id' => $request->lecturerId,
                'module_id' => $request->moduleId,
                'status' => 'ongoing',
                'date' => now()->format('Y-m-d'),
                'time' => now()->format('H:i'),
            ]);

            return response()->json(new SessionResource($newSession), 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json('Failed to create schedule', 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
        return new SessionResource($session);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        //
        $session->update($request->all());
        return new SessionResource($session);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        //
    }
}

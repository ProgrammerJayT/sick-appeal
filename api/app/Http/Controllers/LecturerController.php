<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;
use App\Http\Resources\LecturerResource;

class LecturerController extends Controller
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
    public function store($data)
    {
        //
        try {
            return new LecturerResource(
                Lecturer::create(
                    array(
                        'name' => $data['name'],
                        'surname' => $data['surname'],
                        'lecturer_id' => $data['userId'],
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
    public function show(Lecturer $lecturer)
    {
        //
        return new LecturerResource($lecturer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLecturerRequest $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use App\Filters\LecturersFilter;
use App\Models\Lecturer;
use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;
use App\Http\Resources\LecturerCollection;
use App\Http\Resources\LecturerResource;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new LecturersFilter();
        $filterItems = $filter->transform($request);

        return new LecturerCollection(Lecturer::where($filterItems)->get());
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
                        'course_id' => $data['courseId']
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
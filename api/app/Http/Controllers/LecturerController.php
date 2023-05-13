<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\CourseModule;
use Illuminate\Http\Request;
use App\Filters\LecturersFilter;
use App\Http\Resources\LecturerResource;
use App\Http\Controllers\Auth\CreateUser;
use App\Http\Resources\LecturerCollection;
use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;

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
        $createUser = new CreateUser();
        $newUser = $createUser->create($data);

        return $newUser->getData();
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
        return $lecturer->delete();
    }
}

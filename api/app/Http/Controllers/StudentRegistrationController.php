<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use App\Http\Requests\StoreStudentRegistrationRequest;
use App\Http\Requests\UpdateStudentRegistrationRequest;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRegistrationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRegistrationRequest $request, StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentRegistration $studentRegistration)
    {
        //
    }
}

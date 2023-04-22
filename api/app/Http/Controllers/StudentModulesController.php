<?php

namespace App\Http\Controllers;

use App\Models\StudentModules;
use App\Http\Requests\StoreStudentModulesRequest;
use App\Http\Requests\UpdateStudentModulesRequest;
use Illuminate\Http\Request;

class StudentModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentModulesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentModules $studentModules)
    {
        //
        return new Stude
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentModules $studentModules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentModulesRequest $request, StudentModules $studentModules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentModules $studentModules)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Account;
use App\Http\Resources\AdminResource;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
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
    public function store($data)
    {
        //
        try {
            return new AdminResource(
                Admin::create(
                    array(
                        'name' => $data['name'],
                        'surname' => $data['surname'],
                        'account_id' => $data['accountId'],
                    )
                )
            );
        } catch (\Throwable $th) {
            Account::find($data['account_id'])->delete();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
        return new AdminResource($admin);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
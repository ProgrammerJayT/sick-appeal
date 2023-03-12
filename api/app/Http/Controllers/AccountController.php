<?php

namespace App\Http\Controllers;

use App\Filters\AccountsFilter;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountCollection;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new AccountsFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {

            return new AccountCollection(Account::all());
        }
        return new AccountCollection(Account::where($queryItems)->get());
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
    public function store(StoreAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
        return new AccountResource($account);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
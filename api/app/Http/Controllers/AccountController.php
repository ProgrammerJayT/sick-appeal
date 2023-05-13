<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\CreateAccount;
use App\Http\Controllers\Auth\CreateUser;
use App\Http\Controllers\Validation\ValidateAccount;
use App\Mail\TestMail;
use App\Models\Account;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Filters\AccountsFilter;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountCollection;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new AccountsFilter();
        $filterItems = $filter->transform($request);

        return new AccountCollection(Account::where($filterItems)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        //
        $validateAccount = new ValidateAccount;
        $response = $validateAccount->test($request);

        if ($response->status() != 200) {
            return response()->json($response->getData(), $response->status());
        }

        $createAccount = new CreateAccount;
        $createAccountResponse = $createAccount->create($request);

        if ($createAccountResponse->status() != 201) {
            return response()->json($createAccountResponse->getData(), $createAccountResponse->status());
        }

        $newAccount = $createAccountResponse->getData();

        $createUserData = array(
            'accountId' => $newAccount->accountId,
            'name' => ucfirst(strtolower(trim($request->name))),
            'surname' => ucfirst(strtolower(trim($request->surname))),
            'userId' => $request->userId,
            'type' => $newAccount->type,
        );

        $createUser = new CreateUser;
        $createUserResponse = $createUser->create($createUserData);

        if ($createUserResponse->status() != 201) {
            Account::find($newAccount->accountId)->delete();
            return response()->json($createUserResponse->getData(), $createUserResponse->status());
        }

        $type = $newAccount->type;

        if ($type != 'admin') {
            $registrationData = array(
                'courseId' => $request->courseId,
                'type' => $type,
                'userId' => $request->userId
            );

            $registration = new RegistrationController;
            $registrationResponse = $registration->store($registrationData);
        }

        return new AccountResource(Account::find($newAccount->accountId));
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
        if ($account == null) {
            return response('Account not found', 404);
        }

        return new AccountResource($account);
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
        return $account->delete();
    }
}

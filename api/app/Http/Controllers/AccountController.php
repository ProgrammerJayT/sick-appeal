<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Account;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Filters\AccountsFilter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Http\Resources\AccountResource;
use App\Http\Controllers\Auth\CreateUser;
use App\Http\Resources\AccountCollection;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Controllers\Academics\Schedule;
use App\Http\Controllers\Auth\CreateAccount;
use App\Http\Controllers\Academics\AssignCourses;
use App\Http\Controllers\Academics\AssignModules;
use App\Http\Controllers\Validation\ValidateAccount;
use App\Mail\EmailVerification;

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

        $accounts = Account::where($filterItems)->get();

        return new AccountCollection($accounts);
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

        return $createAccountResponse;

        if ($createAccountResponse->status() != 201) {
            return response()->json($createAccountResponse->getData(), $createAccountResponse->status());
        }

        //Get newly created account
        $newAccount = $createAccountResponse->getData();

        //Set values for creating user type
        $createUserData = array(
            'account_id' => $newAccount->accountId,
            'name' => ucfirst(strtolower(trim($request->name))),
            'surname' => ucfirst(strtolower(trim($request->surname))),
            'user_id' => $request->userId,
            'type' => $newAccount->type,
            'course_id' => $request->courseId,
        );

        //Instantiate create user controller
        $createUser = new CreateUser;
        $createUserResponse = $createUser->create($createUserData);

        if ($createUserResponse->status() != 201) {
            Account::find($newAccount->accountId)->delete();
            return response()->json($createUserResponse->getData(), $createUserResponse->status());
        }

        //Get newly created user
        $newUser = $createUserResponse->getData();

        if ($newAccount->type != 'admin') {
            $assignCourse = new AssignCourses;
            $assignCourseResponse = $assignCourse->loadOne($newUser->{$newAccount->type . 'Id'}, $newAccount->type, $request->courseId);
            $userCourse = $assignCourseResponse->getData();

            $assignModules = new AssignModules;
            $assignModules->generate($newAccount->type, $userCourse->courseId, $newUser->{$newAccount->type . 'Id'});

            if ($newAccount->type == 'lecturer') {
                $schedule = new Schedule;
                return $schedule->create($newUser->lecturerId);
            }
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

    public function verify(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $account = Account::where('email', $request->email)->first();

        if ($account) {

            $token = Str::random(40);
            $hashedToken = Hash::make($token);

            Mail::to($request->email)->send(new EmailVerification($token));

            return response()->json(new AccountResource($account), 200);
        }

        return response()->json('Email address not found', 404);
    }
}

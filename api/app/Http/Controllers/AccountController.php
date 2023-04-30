<?php

namespace App\Http\Controllers;

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
        if ($this->checkUser($request->type, $request->userId)) {
            return response()->json('User account already exists', 403);
        }

        $type = $request->type;
        $domain = $type == 'admin' ? '@sick-applications.co.za' : '@tut4life.ac.za';
        $name = strtolower($request->name);
        $surname = strtolower($request->surname);
        $emailPrefix = $type == 'admin' ? $name . '.' . $surname : $request->userId;

        $email = $emailPrefix . $domain;

        $newAccount = Account::create(
            array(
                'type' => $request->type,
                'password' => Crypt::encrypt('password'),
                'email' => $email,
                'email_verified' => false,
            )
        );

        try {
            // Mail::to('theanthem8@gmail.com')->send(new TestMail('2023-04-30'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }

        $createUserData = array(
            'accountId' => $newAccount->account_id,
            'name' => ucfirst(strtolower(trim($request->name))),
            'surname' => ucfirst(strtolower(trim($request->surname))),
            'userId' => $request->userId,
            'type' => $newAccount->type,
            'courseId' => $request->courseId
        );

        $user = $this->createUser($createUserData);

        if ($user->statusCode == 422) {

            $account = new AccountController;

            $account->destroy($newAccount);

            return response()->json(
                'Account creation failed. ' . $user->message,
                422
            );
        }

        return new AccountResource($newAccount);
    }

    /**
     * Check if user exists
     */
    public function checkUser($type, $id)
    {
        switch ($type) {
            case 'student':
                $model = new Student();
                break;

            case 'lecturer':
                $model = new Lecturer();
                break;

            default:
                $model = null;
                break;
        }

        if ($model == null) {
            return false;
        }

        return $model->find($id);
    }

    /**
     * Now create user type based off of type
     */
    public function createUser($data)
    {
        switch ($data['type']) {
            case 'student':
                $userController = new StudentController();
                break;

            case 'lecturer':
                $userController = new LecturerController();
                break;

            case 'admin':
                $userController = new AdminController();
                break;

            default:
                //
                break;
        }

        return $userController->store($data);
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

<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 50; $i++) {
            $account = Account::factory(1)
                ->create();

            $this->createUser($account);
        }
    }

    public function createUser($account)
    {
        switch ($account[0]->role) {
            case 'student':
                $model = new Student();
                $user = $model->factory(1)->create(
                    array(
                        'account_id' => $account[0]->account_id
                    )
                );
                break;

            case 'lecturer':
                $user = Lecturer::factory(1)->create(
                    array(
                        'account_id' => $account[0]->account_id
                    )
                );
                break;

            case 'admin':
                $user = Admin::factory(1)->create(
                    array(
                        'account_id' => $account[0]->account_id
                    )
                );
                break;

            default:
                # code...
                break;
        }

        return $user;
    }
}
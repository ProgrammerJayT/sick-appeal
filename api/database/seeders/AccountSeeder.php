<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Course;
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
        for ($i = 0; $i < 100; $i++) {
            $account = Account::factory(1)
                ->create();

            $this->createUser($account);
        }
    }

    public function createUser($account)
    {
        $account = $account[0];
        $type = $account->type;
        $emailBreakdown = explode('@', $account->email);

        if ($account->type == 'admin') {
            $fullName = explode('.', $emailBreakdown[0]);
            $name = $fullName[0];
            $surname = $fullName[1];
        } else {
            $name = fake()->firstName();
            $surname = fake()->lastName();
            $id = $emailBreakdown[0];
        }

        switch ($type) {
            case 'student':
            case 'lecturer':
                $model = $type == 'lecturer' ? new Lecturer() : new Student();
                $data = array(
                    'account_id' => $account->account_id,
                    'name' => ucfirst(strtolower($name)),
                    'surname' => ucfirst(strtolower($surname)),
                    $type == 'lecturer' ? 'lecturer_id' : 'student_id' => $id,
                );
                break;

            case 'admin':
                $model = new Admin();
                $data = array(
                    'account_id' => $account->account_id,
                    'name' => ucfirst(strtolower($name)),
                    'surname' => ucfirst(strtolower($surname)),
                );
                break;

            default:
                //Hopefully nothing breaks
                break;
        }

        return $model->factory(1)->create($data);
    }
}
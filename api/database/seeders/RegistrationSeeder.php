<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\LecturerRegistration;
use App\Models\Registration;
use App\Models\Student;
use App\Models\StudentRegistration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $accounts = Account::where('type', '!=', 'admin')->get();
        $thisYear = now()->format('Y');
        $previousYear = now()->subYear()->year;

        // dd($accounts);
        foreach ($accounts as $account) {
            $year = fake()->randomElement(array($thisYear, $previousYear));

            $registration = Registration::create([
                'course_id' => Course::all()->random()->getKey(),
                'year' => $year,
                'status' => $year == $thisYear ? 'registered' : 'deregistered'
            ]);

            $userType = $account->type;
            $userModel = $userType == 'lecturer' ? new Lecturer : new Student;
            $userRegistration = $userType == 'lecturer' ? new LecturerRegistration : new StudentRegistration;
            $user = $userModel->where('account_id', $account->account_id)->first();
            $userId = $userType == 'lecturer' ? $user->lecturer_id : $user->student_id;

            $userRegistration->create([
                $userType . '_id' => $userId,
                'registration_id' => $registration->registration_id
            ]);
        }
    }
}
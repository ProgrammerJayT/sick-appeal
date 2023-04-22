<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
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
        foreach (Student::all() as $student) {
            Registration::create([
                'student_id' => $student->student_id,
                'course_id' => Course::all()->random()->getKey(),
                'year' => fake()->dateTimeThisYear()->format('Y'),
                'status' => 'registered'
            ]);
        }
    }
}
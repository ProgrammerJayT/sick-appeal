<?php

namespace Database\Factories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentTest>
 */
class StudentTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $testsAvailable = Test::where('status', 'open');
        // $numTestsAvailable = $testsAvailable->count();

        return [
            //
            'student_id' => 5,
            'test_id' => 4
        ];
    }
}
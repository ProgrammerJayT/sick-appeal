<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        //Get last 2 digits of the year, and convert to int
        $studentNumberMin = (int) substr(date('Y'), -2) + 229999977;
        $studentNumberMax = (int) substr(date('Y'), -2) + 239999976;

        return [
            //
            'student_id' => $this->faker->unique()->numberBetween($studentNumberMin, $studentNumberMax),
            'account_id' => Account::factory(),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
        ];
    }
}

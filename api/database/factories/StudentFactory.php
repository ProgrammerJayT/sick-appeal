<?php

namespace Database\Factories;

use App\Http\Controllers\Generator;
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
        $generator = new Generator;
        $identity = $generator->generateIdentity();

        return [
            //
            'student_id' => $identity,
            'account_id' => Account::factory(),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
        ];
    }
}
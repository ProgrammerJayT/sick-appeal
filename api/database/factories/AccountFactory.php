<?php

namespace Database\Factories;

use App\Http\Controllers\Randomizer;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $allTypes = array(
        'admin',
        // 'student',
        // 'lecturer'
    );

    public $status = array(
        'active',
        'inactive',
        'pending'
    );

    public function definition(): array
    {
        $type = $this->faker->randomElement($this->allTypes);

        switch ($type) {
            case 'student':
            case 'lecturer':
                $generator = new Randomizer();
                $email = $generator->randomizeIdentity() . '@tut4life.ac.za';
                break;

            case 'admin':
                $email = strtolower($this->faker->firstName() . '.' . $this->faker->lastName() . '@timestamp.co.za');
                break;

            default:
                //
                break;
        }

        return [
            //
            'type' => $type,
            'password' => Hash::make('password'),
            'status' => 'active',
            'email' => $email,
            'email_verified' => true,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->firstName();
        $surname = $this->faker->lastName();
        $email = $this->faker->email();

        return [
            //
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
        ];
    }
}
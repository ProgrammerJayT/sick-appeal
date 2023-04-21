<?php

namespace Database\Factories;

use App\Models\CourseModule;
use App\Models\Lecturer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(array('web', 'semester', 'class'));
        $date = $this->faker->dateTimeThisYear()->format('Y-m-d');

        return [
            //
            'lecturer_id' => Lecturer::all()->random()->getKey(),
            'module_id' => CourseModule::all()->random()->getKey(),
            'date' => $date,
            'time' => $this->faker->time("H:i"),
            'type' => $type,
            'status' => $this->setStatus($date)
        ];
    }

    public function setStatus($date)
    {
        // $dateToday = now()->format('Y-m-d');
        $dateToday = Carbon::createFromFormat('Y-m-d', now()->today()->toDateString());

        if ($date >= $dateToday) {
            return 'pending';
        }

        $diffInDays = $dateToday->diffInDays($date);

        // dd('Test date: ' . $date . '. Difference: ' . $diffInDays);

        if ($diffInDays > 2) {
            return 'expired';
        }

        return 'open';
    }
}
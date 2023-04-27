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
        $lecturer = Lecturer::all()->random();
        $module = CourseModule::where('course_id', $lecturer->getAttribute('course_id'))->get()->random();

        return [
            //
            'lecturer_id' => $lecturer->getKey(),
            'module_id' => $module->module_id,
            'date' => $date,
            'time' => $this->faker->time("H:i"),
            'type' => $type,
            'venue' => $this->faker->streetAddress()
        ];
    }
}
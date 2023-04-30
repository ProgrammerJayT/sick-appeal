<?php

namespace Database\Factories;

use App\Models\CourseModule;
use App\Models\Lecturer;
use App\Models\LecturerRegistration;
use App\Models\Registration;
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
        $lecturers = Lecturer::all()->random();
        $lecturerRegistration = LecturerRegistration::where('lecturer_id', $lecturers->getAttribute('lecturer_id'))->first();
        $module = CourseModule::where('course_id', Registration::find($lecturerRegistration->registration_id)->course_id)->get()->random();
        $times = fake()->randomElement(array('08:00', '09:30', '11:00', '12:30', '14:00', '15:30'));
        $venue = fake()->randomElement(array('10-120', 'Ruth First Hall', '14-1106', '10-140'));

        return [
            //
            'lecturer_id' => $lecturers->getAttribute('lecturer_id'),
            'module_id' => $module->module_id,
            'date' => $date,
            'time' => $times,
            'type' => $type,
            'venue' => $venue
        ];
    }
}
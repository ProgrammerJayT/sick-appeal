<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public $courses = array(
        'Computer System engineering',
        'Multimedia',
        'Information Technology',
        'Informatics'
    );
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < count($this->courses); $i++) {
            Course::create(
                array(
                    'name' => $this->courses[$i],
                )
            );
        }
    }
}
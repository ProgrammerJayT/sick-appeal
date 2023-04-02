<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public $modules = array();

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->assignModules();

        for ($i = 0; $i < count($this->modules); $i++) {
            Module::create(
                array(
                    'code' => $this->modules[$i]['code'],
                    'name' => $this->modules[$i]['name'],
                    'course_id' => $this->modules[$i]['course_id'],
                )
            );
        }
    }

    public function assignModules()
    {
        $this->modules = array(

            //First course modules (Computer... engineering)
            array(
                'code' => 'CAG216D',
                'name' => 'Computer Architecture and Organization 216',
                'course_id' => 1
            ),
            array(
                'code' => 'DAB215D',
                'name' => 'Databases 215',
                'course_id' => 1
            ),
            array(
                'code' => 'DEL216D',
                'name' => 'Digital Electronics 216',
                'course_id' => 1
            ),
            array(
                'code' => 'DP1216D',
                'name' => 'Digital Process Control 216',
                'course_id' => 1
            ),
            array(
                'code' => 'MHS216D',
                'name' => 'Mathematics 216',
                'course_id' => 1
            ),
            array(
                'code' => 'PGM216D',
                'name' => 'Programming 216',
                'course_id' => 1
            ),


            //Second course modules (Multimedia)
            array(
                'code' => 'DTP216D',
                'name' => 'Database Principles',
                'course_id' => 2
            ),
            array(
                'code' => 'MTE216D',
                'name' => 'Multimedia Technology',
                'course_id' => 2
            ),
            array(
                'code' => 'OOP216D',
                'name' => 'Object-Oriented Programming',
                'course_id' => 2
            ),
            array(
                'code' => 'TMO216D',
                'name' => '3D Modelling',
                'course_id' => 2
            ),
            array(
                'code' => 'AOP216D',
                'name' => 'Advanced Object-Oriented programming',
                'course_id' => 2
            ),
            array(
                'code' => 'GMP216D',
                'name' => 'Games Programming',
                'course_id' => 2
            ),

            //Third course modules (Information Technology)
            array(
                'code' => 'CN1216D',
                'name' => 'Computer Networks 215R',
                'course_id' => 3
            ),
            array(
                'code' => 'OOR216D',
                'name' => 'Object-Oriented Programming 216R',
                'course_id' => 3
            ),
            array(
                'code' => 'OSY216D',
                'name' => 'Operating Systems 226R',
                'course_id' => 3
            ),
            array(
                'code' => 'AOR216D',
                'name' => 'Advanced Object-Oriented Programming 226R',
                'course_id' => 3
            ),
            array(
                'code' => 'CN2216D',
                'name' => 'Computer Networks 226R',
                'course_id' => 3
            ),
            array(
                'code' => 'VMA216D',
                'name' => 'Virtual Machines 216R',
                'course_id' => 3
            ),


            //Fourth course modules (Multimedia)
            array(
                'code' => 'DTP216D',
                'name' => 'Database Principles',
                'course_id' => 4
            ),
            array(
                'code' => 'MTE216D',
                'name' => 'Multimedia Technology',
                'course_id' => 4
            ),
            array(
                'code' => 'OOP216D',
                'name' => 'Object-Oriented Programming',
                'course_id' => 4
            ),
            array(
                'code' => 'TMO216D',
                'name' => '3D Modelling',
                'course_id' => 4
            ),
            array(
                'code' => 'AOP216D',
                'name' => 'Advanced Object-Oriented programming',
                'course_id' => 4
            ),
            array(
                'code' => 'GMP216D',
                'name' => 'Games Programming',
                'course_id' => 4
            ),
        );
    }
}
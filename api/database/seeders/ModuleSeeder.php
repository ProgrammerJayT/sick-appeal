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
            ),
            array(
                'code' => 'DAB215D',
                'name' => 'Databases 215',
            ),
            array(
                'code' => 'DEL216D',
                'name' => 'Digital Electronics 216',
            ),
            array(
                'code' => 'DP1216D',
                'name' => 'Digital Process Control 216',
            ),
            array(
                'code' => 'MHS216D',
                'name' => 'Mathematics 216',
            ),
            array(
                'code' => 'PGM216D',
                'name' => 'Programming 216',
            ),


            //Second course modules (Multimedia)
            array(
                'code' => 'DTP216D',
                'name' => 'Database Principles',
            ),
            array(
                'code' => 'MTE216D',
                'name' => 'Multimedia Technology',
            ),
            array(
                'code' => 'OOP216D',
                'name' => 'Object-Oriented Programming',
            ),
            array(
                'code' => 'TMO216D',
                'name' => '3D Modelling',
            ),
            array(
                'code' => 'AOP216D',
                'name' => 'Advanced Object-Oriented programming',
            ),
            array(
                'code' => 'GMP216D',
                'name' => 'Games Programming',
            ),

            //Third course modules (Information Technology)
            array(
                'code' => 'CN1216D',
                'name' => 'Computer Networks 215R',
            ),
            array(
                'code' => 'OOR216D',
                'name' => 'Object-Oriented Programming 216R',
            ),
            array(
                'code' => 'OSY216D',
                'name' => 'Operating Systems 226R',
            ),
            array(
                'code' => 'AOR216D',
                'name' => 'Advanced Object-Oriented Programming 226R',
            ),
            array(
                'code' => 'CN2216D',
                'name' => 'Computer Networks 226R',
            ),
            array(
                'code' => 'VMA216D',
                'name' => 'Virtual Machines 216R',
            ),


            //Fourth course modules (Multimedia)
            array(
                'code' => 'DTP216D',
                'name' => 'Database Principles',
            ),
            array(
                'code' => 'MTE216D',
                'name' => 'Multimedia Technology',
            ),
            array(
                'code' => 'OOP216D',
                'name' => 'Object-Oriented Programming',
            ),
            array(
                'code' => 'TMO216D',
                'name' => '3D Modelling',
            ),
            array(
                'code' => 'AOP216D',
                'name' => 'Advanced Object-Oriented programming',
            ),
            array(
                'code' => 'GMP216D',
                'name' => 'Games Programming',
            ),
        );
    }
}
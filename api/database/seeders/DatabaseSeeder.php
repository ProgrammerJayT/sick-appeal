<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            array(
                CourseSeeder::class,
                ModuleSeeder::class,
                CourseModuleSeeder::class,
                AccountSeeder::class,
                // LecturerCourseSeeder::class,
                // LecturerModuleSeeder::class,
                // StudentCourseSeeder::class,
                // StudentModulesSeeder::class,
                VenueSeeder::class,
                // ScheduleSeeder::class,
            )
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $venues = array('10-120', '14-1106', '10-140', '10-233', 'LG10-12A');

        for ($i = 0; $i < count($venues); $i++) {
            Venue::create([
                'name' => $venues[$i]
            ]);
        }
    }
}

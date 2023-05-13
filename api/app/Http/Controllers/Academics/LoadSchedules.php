<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleCollection;
use App\Models\Schedule;
use Illuminate\Http\Request;

class LoadSchedules extends Controller
{
    //
    public function load($lecturer_id)
    {
        $schedules = Schedule::where('lecturer_id', $lecturer_id)->get();

        return new ScheduleCollection($schedules);
    }
}

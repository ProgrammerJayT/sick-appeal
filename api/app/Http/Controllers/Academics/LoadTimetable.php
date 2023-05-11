<?php

namespace App\Http\Controllers\Academics;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleCollection;
use App\Http\Resources\ScheduleResource;
use App\Models\Lecturer;
use App\Models\Module;
use App\Models\Schedule;
use App\Models\StudentModule;
use App\Models\Venue;
use Illuminate\Http\Request;

class LoadTimetable extends Controller
{
    //
    public function load($student_id)
    {
        $timetable = [];
        $studentModules = StudentModule::where('student_id', $student_id)->get();

        foreach ($studentModules as $studentModule) {
            $schedules = Schedule::where('lecturer_id', $studentModule->lecturer_id)->get();
            foreach ($schedules as $schedule) {
                $lecturer = Lecturer::find($schedule->lecturer_id);
                $timetable[] = collect([
                    'day' => $schedule->day,
                    'startTime' => $schedule->start_time,
                    'endTime' => $schedule->end_time,
                    'venue' => Venue::find($schedule->venue_id)->name,
                    'module' => Module::find($schedule->module_id)->name,
                    'lecturer' => $lecturer->name . ' ' . $lecturer->surname
                ]);
            }
        }

        return $timetable;
    }
}

<?php

namespace App\Http\Controllers\Academics;

use App\Http\Resources\ScheduleCollection;
use App\Models\Venue;
use App\Models\Lecturer;
use App\Models\Schedule as ScheduleModel;
use Illuminate\Http\Request;
use App\Models\LecturerModule;
use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;

class Schedule extends Controller
{
    //
    public function create($lecturer_id)
    {
        $times = array('08:00', '09:30', '11:00', '12:30', '14:00', '15:30');
        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
        $lecturer = Lecturer::find($lecturer_id);

        try {
            $lecturerModules = LecturerModule::where('lecturer_id', $lecturer->lecturer_id)->get();
            foreach ($lecturerModules as $lecturerModule) {

                $randDays = $this->randomizer(0, 4, 3);

                $module_id = $lecturerModule->module_id;
                $lecturer_id = $lecturer->lecturer_id;
                $venue_id = Venue::all()->random()->getAttribute('venue_id');

                for ($i = 0; $i < 3; $i++) {

                    $startIndex = array_rand($times);

                    $startTime = $times[$startIndex];
                    $endTime = date('H:i', strtotime($startTime . ' +1 hour 30 minutes'));

                    $schedule = ScheduleModel::create([
                        'module_id' => $module_id,
                        'lecturer_id' => $lecturer_id,
                        'venue_id' => $venue_id,
                        'day' => $days[$randDays[$i]],
                        'start_time' => $startTime,
                        'end_time' => $endTime
                    ]);
                }
            }

            return new ScheduleResource($schedule);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 500);
        }
    }

    public function randomizer($randMin, $randMax, $loopCap)
    {
        $data = array();
        $count = $randMin;

        while ($count != $loopCap) {
            !in_array($randNum = rand($randMin, $randMax), $data) ? [
                $data[] = $randNum, $count++
            ] : null;
        }
        return $data;
    }
}

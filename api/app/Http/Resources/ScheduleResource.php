<?php

namespace App\Http\Resources;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'scheduleId' => $this->schedule_id,
            'lecturerId' => $this->lecturer_id,
            'moduleId' => $this->module_id,
            'day' => $this->day,
            'startTime' => $this->start_time,
            'endTime' => $this->end_time,
            'venue' => Venue::find($this->venue_id)->name,
        );
    }
}

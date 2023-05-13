<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'testId' => $this->test_id,
            'lecturerId' => $this->lecturer_id,
            'moduleId' => $this->module_id,
            'date' => $this->date,
            'time' => $this->time,
            'type' => $this->type,
            'venue' => $this->venue,
        );
    }
}

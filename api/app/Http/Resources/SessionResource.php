<?php

namespace App\Http\Resources;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'sessionId' => $this->session_id,
            'lecturerId' => $this->lecturer_id,
            'moduleId' => $this->module_id,
            'date' => $this->date,
            'time' => $this->time,
            'status' => $this->status,
        );
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            'adminId' => $this->admin_id,
            'accountId' => $this->account_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
        );
    }
}
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    return [
        'id'    => $this->id,
        'name'  => $this->name,
        'email' => $this->email,
        'phone' => $this->phone,
        'address'=> $this->address,
        // Computed field
        // 'age'   => $this->date_of_birth?->age,
        // Renamed field
        'registered_at' => $this->created_at->toDateString(),
        // Nested resource — only included when eager-loaded
        // 'appointments' => AppointmentResource::collection(
            // $this->whenLoaded('appointments')
        
    ];
}

}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'destination'=>$this->destination,
            'duration'=>$this->duration,
            'price'=>$this->price,
            'total_seat'=>$this->total_seat,
            'description'=>$this->description,
        ];
    }
}

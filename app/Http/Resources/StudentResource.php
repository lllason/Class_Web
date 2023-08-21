<?php

namespace App\Http\Resources;

//use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'age' => (int) $this->age,
            'updated_at' => (string) $this->updated_at,
            'created_at' => (string) $this->created_at,
        ];
    }
}

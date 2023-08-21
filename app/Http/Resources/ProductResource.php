<?php

namespace App\Http\Resources;

//use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'place' => $this->place,
            'price' => (float) $this->price,
            'updated_at' => (string) $this->updated_at,
            'created_at' => (string) $this->created_at,
        ];
    }
}

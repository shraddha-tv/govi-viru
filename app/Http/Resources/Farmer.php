<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Farmer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "address" => $this->address,
            "lat" => (double)$this->lat,
            "long" => (double)$this->long,
            "phoneNo" => $this->phoneNo,
            "whatsappNo" => $this->whatsappNo,
        ];
    }
}

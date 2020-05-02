<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VegetableList extends JsonResource
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
            "vegId" => $this->vegId,
            "vegeName" => $this->category->code,
            "grade" => $this->grade,
            "rate" => $this->rate,
            "quantity" => $this->quantity,
            "date" => $this->date,
            "freeQuantity" => $this->freeQuantity,
            "farmerId" => $this->farmerId,
            "farmer" => $this->farmer->name,
        ];
    }
}

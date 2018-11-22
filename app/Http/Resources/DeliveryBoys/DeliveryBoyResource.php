<?php

namespace App\Http\Resources\DeliveryBoys;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryBoyResource extends JsonResource
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
            'db_id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'contact'=>$this->contact,
        ];
    }
}

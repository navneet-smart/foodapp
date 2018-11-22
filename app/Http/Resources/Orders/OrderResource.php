<?php

namespace App\Http\Resources\Orders;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'cid'=>$this->cid,
            'charges'=>$this->charges,
            'subtotal'=>$this->subtotal,
            'total'=>$this->total,
            'device_token'=>$this->device_token,
            'created' => $this->created,
            'customer'=>[
                'name'=>$this->name,
                'email'=>$this->email,
                'contact' => $this->contact
            ]
        ];
    }
}

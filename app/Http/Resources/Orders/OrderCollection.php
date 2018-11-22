<?php

namespace App\Http\Resources\Orders;

use Illuminate\Http\Resources\Json\Resource;

class OrderCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
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
            ],
            'orders'=>$this->orderDetails
        ];
    }
}

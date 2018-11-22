<?php

namespace App\Http\Resources\FoodTrucks;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Config;

class FoodTruckCollection extends Resource
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
            'f_id'=>$this->id,
            'owner_id'=>$this->user_id,
            'display_name'=>$this->display_name,
            'speciality'=>$this->speciality,
            'min_order_value'=>$this->min_order_value,
            'device_token'=>$this->device_token,
            'note'=>$this->note,
            'logo' => null,
            'image' => Config::get('constants.banner_url').$this->banner['image'],
            'rating' => 0,
            'profile_status' => false,
            'publish_status' => false,
            'foodTruck_info'=>[
                'link'=>route('foodTrucks.show',$this->id)
            ],
            'owner_info'=>[
                'link'=>route('owners.show',$this->user_id)
            ],
            'owner_name'=>$this->owner['name'],
            'owner_email'=>$this->owner['email'],
        ];
    }
}

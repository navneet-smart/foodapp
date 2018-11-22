<?php

namespace App\Http\Resources\DeliveryBoys;

use Illuminate\Http\Resources\Json\Resource;

class DeliveryBoyCollection extends Resource
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
            'db_id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            // 'db_info'=>[
            //     'link'=>route('dboys.show',$this->id)
            // ]
        ];
    }
}

<?php

namespace App\Http\Resources\Owners;

use Illuminate\Http\Resources\Json\Resource;

class OwnerCollection extends Resource
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
            'owner_id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'owner_info'=>[
                'link'=>route('owners.show',$this->id)
            ]
        ];
    }
}

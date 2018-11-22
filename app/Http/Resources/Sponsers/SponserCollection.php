<?php

namespace App\Http\Resources\Sponsers;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Config;

class SponserCollection extends Resource
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
            'id'=>$this->id,
            'display_name'=>$this->display_name,
            'logo' => Config::get('constants.sponser_url').$this->image,
            'sponser_info'=>[
                'link'=>route('sponsers.show',$this->id)
            ]
        ];
    }
}

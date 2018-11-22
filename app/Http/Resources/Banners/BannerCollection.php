<?php

namespace App\Http\Resources\Banners;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Config;

class BannerCollection extends Resource
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
            'banner_id'=>$this->id,
            'f_id'=>$this->f_id,
            'banner'=>Config::get('constants.banner_url').$this->image,
            'banner_info'=>[
                'link'=>route('banners.show',$this->id)
            ]
        ];
    }
}

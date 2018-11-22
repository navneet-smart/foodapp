<?php

namespace App\Http\Resources\Banners;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Config;

class BannerResource extends JsonResource
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
            'banner_id'=>$this->id,
            'f_id'=>$this->f_id,
            'banner'=>Config::get('constants.banner_url').$this->image,
        ];
    }
}

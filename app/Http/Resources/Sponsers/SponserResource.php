<?php

namespace App\Http\Resources\Sponsers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Config;

class SponserResource extends JsonResource
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
            'id'=>$this->id,
            'display_name'=>$this->display_name,
            'logo' => Config::get('constants.sponser_url').$this->image,
        ];
    }
}

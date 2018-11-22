<?php

namespace App\Http\Resources\ProviderCategories;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Config;

class ProviderCategoryResource extends JsonResource
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
            'cat_id'=>$this->id,
            'f_id'=>$this->f_id,
            'category'=>$this->category,
            'foodTruck'=>$this->foodTruck['display_name'],
            'image'=>Config::get('constants.banner_url').$this->banner['image'],
        ];
    }
}

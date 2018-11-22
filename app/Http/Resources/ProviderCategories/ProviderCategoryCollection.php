<?php

namespace App\Http\Resources\ProviderCategories;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Config;

class ProviderCategoryCollection extends Resource
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
            'cat_id'=>$this->id,
            'f_id'=>$this->f_id,
            'category'=>$this->category,
            'category_info'=>[
                'link'=>route('provider-categories.show',$this->id)
            ],
            'foodTruck'=>$this->foodTruck['display_name'],
            'image'=>Config::get('constants.banner_url').$this->banner['image'],
        ];
    }
}
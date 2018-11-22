<?php

namespace App\Http\Resources\Categories;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Config;

class CategoryCollection extends Resource
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
            'category'=>$this->category,
            'icon'=>Config::get('constants.category_url').$this->image,
            'category_info'=>[
                'link'=>route('categories.show', $this->id)
            ]
        ];
    }
}

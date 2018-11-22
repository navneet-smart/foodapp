<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'p_id'=>$this->id,
            'f_id'=>$this->f_id,
            'cat_id'=>$this->cat_id,
            'name'=>$this->name,
            'display_name'=>$this->display_name,
            'description'=>$this->description,
            'size_and_price'=>$this->size_and_price,
            'is_veg'=>$this->is_veg,
            'id_for_extra'=>null,
            'id_for_options'=>null,
            'has_offer'=>false,
            'foodTruck'=>$this->foodTruck['display_name'],
            'category'=>$this->category['category'],
        ];
    }
}

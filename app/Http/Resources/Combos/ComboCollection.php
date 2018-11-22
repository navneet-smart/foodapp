<?php

namespace App\Http\Resources\Combos;

use Illuminate\Http\Resources\Json\Resource;

class ComboCollection extends Resource
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
            'combo_id'=>$this->id,
        ];
    }
}

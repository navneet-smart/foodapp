<?php

namespace App\Http\Resources\Owners;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            'owner_id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'profile_status'=>$this->profile_status,
            'f_id'=>$this->f_id,
            'menu_status'=>$this->menu_status,
        ];
    }
}

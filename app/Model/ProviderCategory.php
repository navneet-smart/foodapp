<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProviderCategory extends Model
{
    protected $fillable = [
        'f_id', 'category'
    ];

    public function foodTruck(){
    	return $this->belongsTo('App\Model\FoodTruck', 'f_id');
    }

    public function banner(){
    	return $this->belongsTo('App\Model\Banner', 'f_id', 'f_id');
    }
}

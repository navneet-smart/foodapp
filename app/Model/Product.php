<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'f_id', 'cat_id', 'name', 'display_name', 'description', 'size_and_price', 'is_veg'
    ];

    public function foodTruck(){
    	return $this->belongsTo('App\Model\FoodTruck', 'f_id');
    }

    public function category(){
    	return $this->belongsTo('App\Model\ProviderCategory', 'cat_id');
    }

    public function banner(){
    	return $this->belongsTo('App\Model\Banner', 'f_id', 'f_id');
    }
}

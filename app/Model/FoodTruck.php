<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
// use App\Model\Banner;

class FoodTruck extends Model
{
    protected $fillable = [
        'owner_id', 'display_name', 'speciality', 'min_order_value', 'device_token', 'note'
    ];

    public function banner(){
    	return $this->hasOne('App\Model\Banner', 'f_id');
    }

    public function owner(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function categories(){
    	return $this->hasMany('App\Model\ProviderCategory', 'f_id');
    }

    public function products(){
    	return $this->hasMany('App\Model\Product', 'f_id');
    }

     public function items(){
        return $this->hasMany('App\Model\Item', 'f_id');
    }
}

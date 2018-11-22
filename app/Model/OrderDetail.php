<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function items(){
    	return $this->hasMany('App\Model\Item', 'order_detail_id');
    }

    // public function order(){
    // 	return $this->belongsTo('App\Model\Order', 'order_id');
    // }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    public function orderDetailDeliveries(){
        return $this->hasMany('App\orderDetailDelivery');
    }
    public function order(){
        return $this->belongsTo('App\Order');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }
}

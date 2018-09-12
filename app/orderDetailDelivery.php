<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetailDelivery extends Model
{
    public function delivery(){
        return $this->belongsTo('App\Delivery');
    }
    public function orderDetail(){
        return $this->belongsTo('App\orderDetail');
    }
}

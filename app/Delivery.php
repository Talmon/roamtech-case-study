<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
    public function orderDetailDeliveries(){
        return $this->hasMany('App\orderDetailDelivery');
    }
}

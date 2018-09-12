<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    protected $fillable = ['order_date','headquarters_id'];

    public function orderDetails(){
        return $this->hasMany('App\orderDetail');
    }
    public function headquarter(){
        return $this->hasOne('App\Headquarter');
    }
}

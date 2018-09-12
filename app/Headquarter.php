<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    public function order(){
        return $this->belongsTo('App\Order');
    }
    public function branch(){
        return $this->hasMany('App\Branch');
    }
}

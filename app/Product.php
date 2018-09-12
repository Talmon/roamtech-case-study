<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = ['supplier_id'];

    public function orderDetails(){
        return $this->hasMany('App\orderDetail');
    }
    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
}

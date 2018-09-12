<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey ='supplier_id';

    protected $fillable = ['delivery_id', 'delivery_date'];
   
    public function deliveries(){
        return $this->hasMany('App\Delivery');
    }
    public function products(){
        return $this->hasMany('App\Product');
    }
}

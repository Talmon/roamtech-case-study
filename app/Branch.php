<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function headquarter(){
        return $this->belongsTo('App\Headquarter');
    }
}

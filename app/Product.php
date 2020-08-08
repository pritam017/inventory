<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function supplier(){
       return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
}

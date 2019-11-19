<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Archive extends Model
{
    public function inventory(){
        return $this->belongsTo('App\Inventory');//one to many
    }
}

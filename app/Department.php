<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    protected $fillable = ['name','code'];

    protected $guarded = ['id'];


    //softDelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function position(){
        return $this->hasMany('App\Position');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    //whitellist
    protected $fillable = ['nip','name','address','email','position_id'];
    //blacklist
    protected $guarded = ['id'];

    //softDelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function position(){
        return $this->belongsTo('App\Position');
    }

    public function inventory(){
        return $this->belongsToMany('App\Inventory');
    }
}

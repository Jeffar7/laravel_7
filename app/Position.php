<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    //wwhitellist
    protected $fillable = ['name','code','department_id'];
    //blacklist
    protected $guarded = ['id'];

    //softDelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function employee(){
        return $this->hasMany('App\Employee');
    }
}

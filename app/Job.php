<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'name', 'description', 
    ];
    function tickets(){
        return $this->hasMany('App\Ticket');
    }
    function levels(){
        return $this->belongsToMany('App\Level','job_level');
    }
}

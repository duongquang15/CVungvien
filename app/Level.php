<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
    function tickets(){
        return $this->hasMany('App\Ticket');
    }
    function jobs(){
        return $this->belongsToMany('App\Job','job_level');
    }
}

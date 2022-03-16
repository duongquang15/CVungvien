<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name', 'job_id', 'cv','level_id','status','start','deadline','priority','description','person_charge',
    ];
    function job(){
        return $this->belongsTo('App\Job');
    }
    function level(){
        return $this->belongsTo('App\Level');
    }
    function departments(){
        return $this->belongsToMany('App\Department');
    }
    function users(){
        return $this->belongsToMany('App\User','assigns');
    }
}

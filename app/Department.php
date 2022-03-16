<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'description', 
    ];
    function tickets(){
        return $this->belongsToMany('App\Ticket');
    }
}

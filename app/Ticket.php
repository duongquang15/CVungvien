<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name', 'job_id', 'cv','level_id','status','start','deadline','priority','description','person_charge',
    ];
}

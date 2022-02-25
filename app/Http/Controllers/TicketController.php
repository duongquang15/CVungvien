<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function create()
    {
        $name = Auth::user()->name;
        return view('fontend.create',compact('name'));
    }
}

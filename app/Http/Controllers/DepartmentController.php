<?php

namespace App\Http\Controllers;

use App\Department;
use App\Ticket;
use App\User;
use App\Exports\TicketsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTicketByDepartment($id)
    {
        // show ticket theo phòng ban
        $department = Department::find($id);
        $tickets = $department->tickets;

        $department_name = $department->name; 
        $stt = 1;  
        return view('fontend.tickets.top_page', compact('tickets', 'stt', 'department_name'));
    }

    public function showTicket()
    {
        // show ticket tất cả phòng ban
        $tickets = Ticket::all();

        $department_name = 'Tất cả phòng ban';
        $stt = 1;
        return view('fontend.tickets.top_page', compact('tickets', 'stt', 'department_name'));
    }


    /**
     * Export Ticket theo phòng ban
     */
    public function exportTickets()
    {
        return Excel::download(new TicketsExport, 'tickets.xlsx');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

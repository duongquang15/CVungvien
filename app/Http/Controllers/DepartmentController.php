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
        // check role
        $user_id = Auth::user()->id;
        $user_department_id = Auth::user()->department_id;
        $role = User::find($user_id)->role;

        // show ticket theo phòng ban
        $department = Department::find($id);

        if ($role->id == 3) {
            // role admin
            $tickets = $department->tickets;
        } else if ($role->id == 2) {
            // role truong phong
            if ($user_department_id == $id) {
                $tickets = $department->tickets;
            }
            else {
                $tickets = Ticket::with('users', 'departments')
                                ->whereHas('users', function($query) use($user_id) {
                                    $query->where('users.id', '=', $user_id); 
                                 })
                                ->whereHas('departments', function($query) use($id) {
                                    $query->where('departments.id', '=', $id); 
                                })
                                ->get();
            }
        } else {
            // role user
            $tickets = Ticket::with('users', 'departments')
                                ->whereHas('users', function($query) use($user_id) {
                                    $query->where('users.id', '=', $user_id); 
                                 })
                                ->whereHas('departments', function($query) use($id) {
                                    $query->where('departments.id', '=', $id); 
                                })
                                ->get();
        }

        $department_name = $department->name;
        $department_id = $department->id; 
        $stt = 1;  
        return view('fontend.tickets.top_page', compact('tickets', 'stt', 'department_name', 'department_id'));
    }

    /**
     * show ticket toàn bộ phòng ban
     */
    public function showTicket()
    {
        // check role
        $user_id = Auth::user()->id;
        $user_department_id = Auth::user()->department_id;
        $role = User::find($user_id)->role;

        // show ticket tất cả phòng ban
        if ($role->id == 3) {
            // role admin
            $tickets = Ticket::all();
        } else if ($role->id == 2) {
            // role truong phong
            $tickets = Department::find($user_department_id)->tickets;
            $tickets_anotherDPM = Ticket::with('users', 'departments')
                ->whereHas('users', function($query) use($user_id) {
                    $query->where('users.id', '=', $user_id); 
                })
                ->whereHas('departments', function($query) use($user_department_id) {
                    $query->where('departments.id', '!=', $user_department_id); 
                })
                ->get();
            $tickets = $tickets->merge($tickets_anotherDPM);
        } else {
            // role user
            $tickets = User::find($user_id)->tickets;
        }

        $department_name = 'Toàn công ty';
        $department_id = 0;
        $stt = 1;
        return view('fontend.tickets.top_page', compact('tickets', 'stt', 'department_name', 'department_id'));
    }


    /**
     * Export Ticket theo Maatwebsite/excel
     */
    public function exportTickets($id)
    {
        // check role
        $user_id = Auth::user()->id;
        $role = User::find($user_id)->role;

        if ($role->id == 3) {
            // tất cả phòng ban thì sec mặc định id = 0
            if ($id == 0){
                $tickets = Ticket::all();
            }
            else {
                $department = Department::find($id);
                $tickets = $department->tickets;
            } 
        }
        else {
            $tickets = null;
        }
        $stt = 1;
        return Excel::download(new TicketsExport($tickets, $stt), 'tickets.xlsx');
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

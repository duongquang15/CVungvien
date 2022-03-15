<?php

namespace App\Http\Controllers;

use App\Department;
use App\Job;
use App\Level;
use App\Ticket;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TicketController extends Controller
{
    public function create()
    {
        $name = Auth::user()->name;
        $job = Job::all();
        $level = Level::all();
        $user = User::all();
        $department = Department::all();
        return view('fontend.tickets.create-ticket',compact('name','job','level','user','department'));
    }
    function stores(Request $request){
        $request->validate([
            'name'=>'required|unique:tickets|min:5|max:255',
            'job'=>'required|not_in:0',
            'level'=>'required|not_in:0',
            'file'=>'required|image|mimetypes:image/jpeg,image/png|max:5000',
            'status'=>'required|not_in:0',
            'priority'=>'required|not_in:0',
            'date-start'=>'required',
            'date-deadline'=>'required',
            'department'=>'required',
        ],
        [
            'required'=>':attribute không được để trống',
            'min'=>':attribute độ dài phải trên 5 ký tự',
            'max'=>':attribute độ dài phải dưới 255 ký tự',
            'mimetypes:image/jpg,image/png'=>':attribute có dạng đuôi phải là jpg hoặc png',
            'not_in'=>':attribute Không được để trống',
        ],
        [
            'name'=>'Họ Tên',
            'job'=>'Job',
            'price'=>'Level',
            'file'=>'File tải lên',
            'status'=>'Status',
            'priority'=>'Độ ưu tiên',
            'date-start'=>'Ngày bắt đầu',
            'date-deadline'=>'Ngày kết thúc',
            'department'=>'Phòng Ban'
        ]);
        if($request->hasFile('file')){
            $file= $request->file;
            $filename= $file->getClientOriginalName();
            $thumbnail = "uploads/".$filename;
            $file->move('public/uploads/', $file->getClientOriginalName());

        }
        $TicketCreate = Ticket::create([
            'name' => $request->input('name'), 
            'job_id' => $request->input('job'),
            'cv' => $thumbnail ,
            'level_id' => $request->input('level'),
            'status' => $request->input('status'),
            'start' => $request->input('date-start'),
            'deadline' => $request->input('date-deadline'),
            'priority' => $request->input('priority'),
            'user_id' =>  $request->user()->id ,
            'description'=>$request->input('description'),
        ]);
        $departments = $request->department;
            foreach ($departments as $departmentID) {
                DB::table('department_ticket')->insert([
                    'department_id'=>$TicketCreate->id,
                    'ticket_id'=>$departmentID,
                ]);
            }   

        $person_charges = $request->person_charge;
            foreach ($person_charges as $person_chargeID) {
                DB::table('assigns')->insert([
                    'ticket_id'=>$TicketCreate->id,
                    'user_id'=>$person_chargeID,
                ]);
            }
        $id = auth()->user()->id;
            DB::table('assigns')->insert([
                'ticket_id'=>$TicketCreate->id,
                'user_id'=>$id,
            ]);
        return redirect('create-ticket')->with('status','thêm bài viết thành công');
    }

    function add_jobs(Request $request){
        if ($request->ajax()) {
            $name = $request->input('id');
            $job =Job::where('id', $name)->get()->first();
            if(isset($job)){
                $data = [
                    'name' => $name,
                ];
            }
            else{
                $jobs_count = DB::table('jobs')
                ->where('name', '=', $name)
                ->count();
                if ($jobs_count < 1) {
                    $jobCreate = Job::create([
                        'name' => $name,
                        'description' => $name,
                    ]);
                    $job_id = $jobCreate->id;
                    $data = [
                        'name' => 'yes',
                        'job_id'=> $job_id,
                    ];
                }
                $job_id = Job::max('id');
                $data = [
                    'name' => 'yes',
                    'job_id'=>$job_id,
                ];
            }
            return response()->json(['status' => 200, 'data' => $data]);
         }
    }
    function add_levels(Request $request){
        if ($request->ajax()) {
            $name = $request->input('id');
            if($name != 0 ){
                $level = Level::where('id', $name)->get()->first();
            if(isset($level)){
                $data = [
                    'name' => $name,
                ];
            }
            else{
                $levels_count = DB::table('levels')
                ->where('name', '=', $name)
                ->count();
                if ($levels_count < 1) {
                    $levelCreate = Level::create([
                        'name' => $name,
                        'description' => $name,
                    ]);
                    $level_id = $levelCreate->id;
                    $data = [
                        'name' => 'yes',
                        'level_id'=> $level_id,
                    ];
                }
                $level_id = Level::max('id');
                $data = [
                    'name' => 'yes',
                    'level_id'=>$level_id,
                ];
            }
            return response()->json(['status' => 200, 'data' => $data]);
            }
         }
    }

    function show_levels(Request $request){
        if ($request->ajax()) {
            $job = $request->input('job');
            if($job != 0){
                $level = Job::find($job)->levels;
                if(count($level) == 0){
                    return  response()->json(['status' => 400]);
                }
                return response()->json(['status' => 200, 'data' => $level]);
            }
            else{
                return  response()->json(['status' => 400]);
            }
        }
    }

    function edit($id){
        $name = Auth::user()->name;
        $job = Job::all();
        $level = Level::all();
        $user = User::all();
        $department = Department::all();
        $ticket = Ticket::find($id);
        $ticket_job = Ticket::find($id)->job;
        $ticket_level = Ticket::find($id)->level;
        $ticket_department = Ticket::find($id)->departments;
        $user_assigns = Ticket::find($id)->users;
        return view('fontend.tickets.edit-ticket', compact('name','ticket','job','ticket_job','ticket_level','user','level','department','ticket_department','user_assigns'));
    }

    function detail($id){
        $name = Auth::user()->name;
        $job = Job::all();
        $level = Level::all();
        $user = User::all();
        $department = Department::all();
        $ticket = Ticket::find($id);
        $ticket_job = Ticket::find($id)->job;
        $ticket_level = Ticket::find($id)->level;
        $ticket_department = Ticket::find($id)->departments;
        $user_assigns = Ticket::find($id)->users;
        return view('fontend.tickets.detail-ticket', compact('name','ticket','job','ticket_job','ticket_level','user','level','department','ticket_department','user_assigns'));
    }

    function download($id){
       $ticket = Ticket::find($id);
       $file = $ticket->cv;
       echo public_path();
       
    $headers = array(
        'Content-Type: application/pdf',
      );
      echo substr('abcdef', 1);     // bcdef
        return Response::download($file, 'filename.pdf', $headers);

        
    }

    
}

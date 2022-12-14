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
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'job'=>'required|not_in:0',
            'level'=>'required|not_in:0',
            'status'=>'required|not_in:0',
            'priority'=>'required|not_in:0',
            'date-start'=>'required',
            'date-deadline'=>'required',
            'department'=>'required',
        ],
        [
            'required'=>'Chưa nhập :attribute ',
            'min'=>':attribute độ dài phải trên 5 ký tự',
            'max'=>':attribute độ dài phải dưới 255 ký tự',
            'mimetypes:image/jpg,image/png'=>':attribute có dạng đuôi phải là jpg hoặc png',
            'not_in'=>'Chưa nhập :attribute',
            'name.without_spaces'=>'Nhập sai name',
            'regex'=>'Nhập sai name',
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

        }else{
            $thumbnail = '';
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
        if (isset($departments)) {
            foreach ($departments as $departmentID) {
                DB::table('department_ticket')->insert([
                    'ticket_id'=>$TicketCreate->id,
                    'department_id'=>$departmentID,
                ]);
            }
        }  

            $person_charges = $request->person_charge;
            if (isset($person_charges)) {
                foreach($person_charges as $person_charge){
                    DB::table('assigns')->insert([
                        'user_id'=>$person_charge,
                        'ticket_id'=>$TicketCreate->id,
                    ]);
                }
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
                if($name != '' || $name!=0){
                    $jobs_count = DB::table('jobs')
                ->where('name', '=', $name)
                ->count();
                if ($jobs_count < 1) {
                    $jobCreate = Job::create([
                        'name' => $name,
                        'description' => $name,
                    ]);
                    $job_id = Job::max('id');
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
            }
            return response()->json(['status' => 200, 'data' => $data]);
         }
    }
    function add_levels(Request $request){
        if ($request->ajax()) {
            $job = $request->input('job');
            $name = $request->input('id');
            // if($name != 0 ){
                $get_level = Level::where('name','=', $name)->first();
                if(isset($get_level)){
                    $level_id = $get_level['id'];
                    DB::table('job_level')->insert([
                        'job_id' => $job,
                        'level_id'=> $level_id,
                    ]);
                    $data = [
                        'name' => 'yes',
                        'level_id'=> $level_id,
                    ];
                }else{
                    $level = Level::where('id','=', $name)->first();
                    if(isset($level)){
                        $level_id = $level['id'];
                        $data = [
                            'name' => 'yes',
                            // 'level_id'=> $level_id,
                        ];
                    }
                else{
                    $levels_count = DB::table('levels')
                    ->where('name', '=', $name)
                    ->count();
                        if ($levels_count < 1) {
                            if($job != '0' && $job != 'null'){
                                $levelCreate = Level::create([
                                    'name' => $name,
                                    'description' => $name,
                                ]);
                                $level_id = Level::max('id');
                                DB::table('job_level')->insert([
                                    'job_id' => $job,
                                    'level_id'=> $level_id,
                                ]);
                                $data = [
                                    'name' => 'yes',
                                    'level_id'=> $level_id,
                                ];
                            }
                            
                        }
                    $level_id = Level::max('id');
                    $data = [
                        'name' => 'yes',
                        'level_id'=>$level_id,
                    ];
                    return response()->json(['status' => 200, 'data' => $data]);
                }
                }
                
            
            // }
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
        $job_id = Ticket::find($id)->job->id;
        $level_by_job = Job::find($job_id)->levels;
        $level = Level::all();
        $job = Job::all();
        $user = User::all();
        $department = Department::all();
        $ticket = Ticket::find($id);
        $ticket_job = Ticket::find($id)->job;
        $ticket_level = Ticket::find($id)->level;
        $ticket_department = Ticket::find($id)->departments;
        $user_assigns = Ticket::find($id)->users;
        return view('fontend.tickets.edit-ticket', compact('name','ticket','job','ticket_job','ticket_level','user','level','department','ticket_department','user_assigns','level_by_job'));
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
       $file_path = public_path($file);
       return response()->download( $file_path);
    }

    function update(Request $request, $id){
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'job'=>'required|not_in:0',
            'level'=>'required|not_in:0',
            'status'=>'required|not_in:0',
            'priority'=>'required|not_in:0',
            'date-start'=>'required',
            'date-deadline'=>'required',
            'department'=>'required',
        ],
        [
            'required'=>'Chưa nhập :attribute ',
            'min'=>':attribute độ dài phải trên 5 ký tự',
            'max'=>':attribute độ dài phải dưới 255 ký tự',
            'mimetypes:image/jpg,image/png'=>':attribute có dạng đuôi phải là jpg hoặc png',
            'not_in'=>'Chưa nhập :attribute',
            'name.without_spaces'=>'Nhập sai name',
            'regex'=>'Nhập sai name',
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

        }else{
            $thumbnail='';
        }
        
        $ticket1 = DB::table('tickets')->where('id', '=', $id)->get();
        $ticket_request = $request->all();
        $change = [];
        $name = auth()->user()->name;
        foreach($ticket1 as $item){
            if($item->name != $request->input('name')){
                 $change['name']=$name.' '.'đã thay đổi name'.',';
            }else{
                $change['name']='';
            }
            if($item->job_id != $request->input('job')){
                $change['job'] = $name .' '.'đã thay đổi job'.',';
            }else{
                $change['job']='';
            }
            if($item->level_id != $request->input('level')){
                $change['level'] = $name .' '.'đã thay đổi level'.',';
            }else{
                $change['level']='';
            }
            if($item->cv != $thumbnail){
                $change['cv'] = $name .' '.'đã thay đổi cv'.',';
            }else{
                $change['cv']='';
            }
            if($item->status != $request->input('status')){
                $change['status'] = $name .' '.'đã thay đổi status'.',';
            }else{
                $change['status']='';
            }
            if($item->start != $request->input('date-start')){
                $change['start'] = $name .' '.'đã thay đổi start'.',';
            }else{
                $change['start']='';
            }
            if($item->deadline != $request->input('date-deadline')){
                $change['deadline'] = $name .' '.'đã thay đổi deadline'.',';
            }else{
                $change['deadline']='';
            }
            if($item->priority != $request->input('priority')){
                $change['priority'] = $name .' '.'đã thay đổi độ ưu tiên'.',';
            }else{
                $change['priority']='';
            }
            if($item->description != $request->input('description')){
                $change['description'] = $name .' '.'đã thay đổi miểu tả'.',';
            }else{
                $change['description']='';
            }
            
        }
            $Ticket_update = Ticket::where('id',$id)->update([
            'name' => $request->input('name'), 
            'job_id' => $request->input('job'),
            'cv' => $thumbnail ,
            'level_id' => $request->input('level'),
            'status' => $request->input('status'),
            'start' => $request->input('date-start'),
            'deadline' => $request->input('date-deadline'),
            'priority' => $request->input('priority'),
            'description'=>$request->input('description'),
            'person_change'=>$change['name'].$change['job'].$change['level'].$change['cv'].$change['status'].$change['start'].$change['deadline'].$change['priority'].$change['description'],
            'change'=>auth()->user()->name,
        ]);
        $departments = $request->department;
        if (isset($departments)) {
            DB::table('department_ticket')->where('ticket_id',$id)->delete();
            foreach ($departments as $departmentID) {
                DB::table('department_ticket')->insert([
                    'ticket_id'=>$id,
                    'department_id'=>$departmentID,
                ]);
            }
        }

        $person_charges = $request->person_charge;
        if (isset($person_charges)) {
            DB::table('assigns')->where('ticket_id',$id)->delete();
            foreach($person_charges as $person_charge){
                DB::table('assigns')->insert([
                    'user_id'=>$person_charge,
                    'ticket_id'=>$id,
                ]);
            }
        }
        return redirect(route('edit-ticket',$id))->with('status','update thành công');
    }

    
}

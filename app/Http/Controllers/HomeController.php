<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function reset(){
        return view('resetpass');
    }
    public function changepass(){
        return view('changepass');
    }
    function resetpass(Request $request)
    {
        $request->validate([
        
         'password' => 'required|string|min:8|same:confirm_password',
         'confirm_password' => 'required|string|min:8|same:confirm_passwords',
       ],[
        'required'=>':attribute không được để trống',
        'min'=>':attribute độ dài phải trên 8 ký tự',
        'same'=>':attribute không khớp,vui lòng nhập lại',
       ]);

    
   }
   function changepassword(Request $request){
    $id = Auth::user()->id;
    $data = User::find($id);
    $old_password=$request->input('current_pass');
    $new_password=$request->input('password');
    $user = User::where('id', $id)->first();
    $bp=password_hash($new_password, PASSWORD_BCRYPT);
     if(Hash::check($old_password, $user->password)){
        DB::table('users')
                ->where('id', $user->id)
                ->update(['password' =>$bp]);
        return redirect('login') ;
     }else{
         return view('changepass');
     }
   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    $request->validate([
        'old_password' => 'required',
        'password' => 'required|string|min:8|same:confirm_password',
        'confirm_password' => 'required|string|min:8|same:confirm_password',
      ],[
        'required'=>':attribute không được để trống',
        'min'=>':attribute độ dài phải trên 8 ký tự',
        'same'=>':attribute không khớp,vui lòng nhập lại',
      ]);
    //   $user = \Auth::user();

    // 	if (!\Hash::check($request->pld_password, $user->password)) {
    //         return back()->with('error', 'Current password does not match!');
    //     }

    //     $user->password = \Hash::make($request->password);

    //     $user->save();

    //      return back()->with('success', 'Password successfully changed!');
   }
   
}

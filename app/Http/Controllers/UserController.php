<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Role;
use App\Ticket;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * chỉnh sửa bới Thắng Em
     */
    public function show()
    {
        $user_id = Auth::user()->id;
        $role_id = User::find($user_id)->role->id;
        // show toàn bộ user
        $users = User::orderBy('email', 'ASC')->get();
        $value_option = 'UserID';
        return view('fontend.users.table_data_users', compact('users', 'value_option'));
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

    public function editUser($id)
    {
        //edit user bởi Thắng Em
        $user = User::find($id);
        $departments = Department::all();
        $roles = Role::all();
        return view('fontend.users.edit_user', compact('user', 'departments', 'roles'));
    }

    /**
     * update user
     */

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $departments = Department::all();
        $roles = Role::all();
        //edit user bởi Thắng Em

        if ($request->input('password_user') == null) 
        {
            $email = $request->input('email_user');
            $password = $request->input('password_user');
            $name = trim($request->input('name_user'));
            $department = $request->input('department_user');
            $role = $request->input('role_user');
            $request->validate([
                'email_user'=>'required|min:6|max:255|email',
                'name_user'=>'required|max:255|regex:/^[\pL\s\-]+$/u',
                ],
                [
                    'required'=>'Chưa nhập :attribute ',
                    'min'=>'Nhập sai :attribute',
                    'max'=>'Nhập sai :attribute',
                    'email'=>'Email không tồn tại',
                    'regex'=>'Nhập sai :attribute',

                    // 'unique'=>':attribute trùng :attribute đã có',
                ],
                [
                    'email_user'=>'Email',
                    'name_user'=>'Họ tên',
                ]);
                $user_old_email = User::find($id)->email;
                $user_list = User::all();
                // foreach so sánh email mới nhập bị trùng
                foreach ($user_list as $user) {
                    if ($email !== $user_old_email && $email == $user->email) {
                        return Redirect::back()->with('message_update_email', 'Email trùng Email đã có');
                    }
                }
            DB::table('users')->where('id', $id)->update(
                ['id' => $id, 'name' => $name, 'email' => $email, 'department_id' => $department, 'role_id' => $role,
                ]
            );
            return Redirect::back()->with('message_update', 'Message Update');
        }
        else 
        {
            $email = $request->input('email_user');
            $password = $request->input('password_user');
            $name = trim($request->input('name_user'));
            $department = $request->input('department_user');
            $role = $request->input('role_user');
            $request->validate([
                'email_user'=>'required|min:6|max:255|email',
                'password_user'=>'min:6|max:10|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{3,10}$/',
                'name_user'=>'required|max:255|regex:/^[\pL\s\-]+$/u',
            ],
            [
                'required'=>'Chưa nhập :attribute',
                'min'=>'Nhập sai :attribute',
                'max'=>'Nhập sai :attribute',
                'email'=>'Email không tồn tại',
                'regex'=>'Nhập sai :attribute',

                // 'unique'=>':attribute trùng :attribute đã có',
            ],
            [
                'email_user'=>'Email',
                'password_user'=>'Mật khẩu',
                'name_user'=>'Họ tên',
            ]);
            $user_old_email = User::find($id)->email;
            $user_list = User::all();
            // foreach so sánh email mới nhập bị trùng
            foreach ($user_list as $user) {
                if ($email !== $user_old_email && $email == $user->email) {
                    return Redirect::back()->with('message_update_email', 'Email trùng Email đã có');
                }
            }
            DB::table('users')->where('id', $id)->update(
                ['id' => $id, 'name' => $name, 'email' => $email, 'password' => Hash::make($password), 'department_id' => $department, 'role_id' => $role,
                ]
            );
            return Redirect::back()->with('message_update', 'Message Update');
        }
    }
    /**
     * delete user
     */

    public function deleteUser($id)
    {
        //delete user + assign duoc attach

        $user = User::find($id);
        $user->tickets()->detach();

        $user_delete = User::find($id)->delete();
        return redirect('/table-data-users');
    }


    /**
     * sort theo select option
     */
    public function sortUser(Request $request)
    {
        $user_id = Auth::user()->id;
        $role_id = User::find($user_id)->role->id;
        $users = User::orderBy('email', 'ASC')->get();
        //sort user bởi Thắng Em
        $value_option = 'UserID';
        $value_select = $request->input('sort_users');
        if ($value_select == 1) {
            $users = User::orderBy('email', 'ASC')->get();
            $value_option = 'UserID';
        }
        if ($value_select == 2) {
            $users = User::orderBy('name', 'ASC')->get();
            $value_option = 'Họ tên';
        }
        if ($value_select == 3) {
            $users = User::orderBy(Department::select('name')
                        ->whereColumn('departments.id', 'users.department_id')
                        )->get();
            $value_option = 'Phòng ban';
        }
        if ($value_select == 4) {
            $users = User::orderBy(Role::select('name')
                        ->whereColumn('roles.id', 'users.role_id')
                        )->get();
            $value_option = 'Phân quyền';
        }
        if ($value_select == 5) {
            $users = User::orderBy('created_at', 'ASC')->get();
            $value_option = 'Ngày tạo';
        }
        if ($value_select == 6) {
            $users = User::orderBy('created_by', 'ASC')->get();
            $value_option = 'Người tạo';
        }
        return view('fontend.users.table_data_users', compact('users', 'value_option'));
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

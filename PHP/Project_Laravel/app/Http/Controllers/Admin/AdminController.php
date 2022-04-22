<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Models\User;
use App\Models\admin\Admin;

class AdminController extends Controller
{

    private $admin;
    public function __construct()
    {
        $this -> admin = new Admin();
    }

    public function login() {
        $title = 'Đăng nhập vào trang quản trị';
        return view('admin.login', compact('title'));
    }

    public function checkLogin(Request $request) {

        $username = $request -> username;
        $password = $request -> password;
        
        $users = DB::select('SELECT * FROM admins where username = ? and password = ?', [$username, $password]);

        if ($users == []) return back()->with('msg', 'Đăng nhập thất bại')->with('type', 'danger');
        $users = [];
        return redirect(route('admin.userList',compact('users')))->with('msg', 'Đăng nhập thành công')->with('type', 'success');
    }

    public function checkAdminExists(Request $request) {
        $username = $request -> username;
        $password = $request -> password;

        $admins = DB::select('SELECT * FROM admins where username = ?', [$username]); 

        if ($admins != []) return back()->with('msg', 'Tài khoản đã tồn tại')->with('type', 'danger');
        $this -> admin -> insertAdmin($username, $password);
        return back()->with('msg', 'Đăng ký thành công')->with('type', 'success');
    }

    public function userList() {
        $title = 'Danh sách người dùng';

        $icon = asset('assets/images/favicon.ico');

        $users = DB::select('SELECT * FROM users ORDER BY created_at DESC');

        // $userList = $this -> user -> getAllUsers();

        return view('admin.list', compact('title', 'icon', 'users'));
    }

    public function editUser($id = 0) {
        
        $title = 'Sửa thông tin người dùng';

        $icon = asset('assets/images/favicon.ico');

        return view('admin.edit',compact('title','icon'));
    }

    public function handleEditUser() {
        
    }
}

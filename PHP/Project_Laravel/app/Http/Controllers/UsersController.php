<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    private $user;
    public function __construct()
    {
        $this -> user = new User();
        $this->middleware('checkLogin', ['except' => ['login', 'register']]);
    }

    public function index() {
        $title = 'Danh sách người dùng';

        $icon = asset('assets/images/favicon.ico');

        $userList = $this -> user -> getAllUsers();

        $id = 1;

        $user = DB::select('SELECT * FROM users ORDER BY created_at DESC');
        return view('clients.users.list', compact('title', 'userList', 'icon'));
    }

    public function add() {
        $title = 'Thêm người dùng';

        $icon = asset('assets/images/favicon.ico');

        return view('clients.users.add', compact('title', 'icon'));
    }

    public function store(Request $request) {
        $request -> validate([
            'username' => 'required|string|min:5',
            'email' => 'required|email|string',
            'password' => 'required|string|confirmed|min:6',
            'fullname' => 'string|min:2',
            'birthday' => 'date_format:Y-m-d|before_or_equal:today',
            'identity_number' => 'string|min:10',
            'address' => 'string'
        ]);

        $input = $request -> only(
            'username',
            'email',
            'password',
            'password_confirmation',
            'fullname',
            'gender',
            'account_type',
            'birthday',
            'address',
            'g-captcha'
        );

        if (is_null($request->input('g-recaptcha-response'))) {
            return response('', 422);
        };

        $response = Http::post('http://long.com:8000/api/auth/register', $input);

        return json_decode($response);
    }

    public function login(Request $request)
    {
        $request -> validate([
            'username' => 'required|string|min:5',
            'password' => 'required|string|min:6',
        ]);

        $input = $request -> only(
            'username',
            'password'
        );

        $response = json_decode(Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('http://long.com:8000/api/auth/login', $input));
            if ($response->code != 200) {
                return response()->json(['code' => 401, 'message' => 'Đăng nhập thất bại!']);
            }

        if ($request->remember == 'on' && $response->code == 200) {
            Cookie::queue('username', $request->username, 60*24*7);
            Cookie::queue('password', $request->password, 60*24*7);
            Cookie::queue('checked', true, 60*24*7);
        } else{
            Cookie::queue('username', '', 60*24*7);
            Cookie::queue('password', '', 60*24*7);
            Cookie::queue('checked', false, 60*24*7);
        }
        Cookie::queue('user', $response->user);
        Cookie::queue('token', $response->access_token);
        session(['logged_in' => 'true']);
        return $response;

    }

    public function logout()
    {

        $reponse = json_decode(Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => Cookie::get('token')
        ])->post('http://long.com:8000/api/auth/logout'));

        session() -> forget('logged_in');
        return response(route('nha-dat-ban'), 200);
    }
}

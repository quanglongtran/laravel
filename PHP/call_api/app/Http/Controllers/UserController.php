<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    private $bearerToken;

    public function index()
    {
        return view('client.index');
    }

    public function registerHandle(Request $request)
    {
        $validator = $request -> validate([
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'same:password',
            'fullname' => 'required|min:6'
        ], [
            'email.email' => 'Trường này phải là email!',
            'email.required' => 'Bắt buộc phải nhập email!',
            'password.required' => 'Bắt buộc phải nhập password!',
            'password.min' => 'Tối thiểu 4 ký tự!',
            'password.confirmed' => 'Mật khẩu nhẩu lại chưa khớp!',
            'password_confirmation.same' => 'Mật khẩu nhập lại chưa khớp!',
            'fullname.required' => 'Bắt buộc phải nhập tên!',
            'fullname.min' => 'Tối thiểu 6 ký tự!'
        ]);
        
        $response = Http::withHeaders(['Accept' => 'application/json'])->post('long.com:8000/api/register', [
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'name' => $request->fullname
        ]);

        return back() -> with(['email' => $request -> email, 'password' => $request -> password]);
    }

    public function loginHandle(Request $request)
    {
        $response = Http::post('long.com:8000/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = json_decode($response->body())->token;

        $product = json_decode(Http::get('long.com:8000/api/products')->body());
        $cookie = Cookie::queue('token', $token, 60 * 24 * 7);

        // $user = json_decode($response->body())->user;
        // $call_api_token = $user->createToken('myapptoken')->plainTextToken;
        // Cookie::queue('call_api_token', $call_api_token);

        $data = $request -> input();
        $request -> session() -> put('logged_in', true);
        // echo session('email');

        return redirect()->route('product.index')->with([
            'message' => 'Successful login',
            'type' => 'success'
        ]);
    }

    public function logoutHandle(Request $request)
    {
        echo $this->bearerToken;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Cookie::get('token'),
            'Accept' => 'application/json'
        ])->post('long.com:8000/api/logout');

        Cookie::queue('token', '');

        if (session() -> has('logged_in')) {
            session() -> forget('logged_in');
        }

        return redirect()->route('index')->with([
            'message' => 'Successful logut',
            'type' => 'success'
        ]);
    }

    public function showProduct()
    {

        return redirect()->action(ProductController::class);
    }
}

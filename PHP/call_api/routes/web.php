<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [UserController::class, 'index'])->name('index');
Route::post('login', [UserController::class, 'loginHandle'])->name('loginHandle');
Route::post('register', [UserController::class, 'registerHandle'])->name('registerHandle');
// Route::resource('product', ProductController::class);

Route::middleware('checkLogin')->group(function () {
    Route::post('logout', [UserController::class, 'logoutHandle'])->name('logoutHandle');
    Route::resource('product', ProductController::class);
    Route::get('search', [OrderController::class, 'search'])->name('search');
});

Route::get('cookie', function () {
    return 'Bearer ' . Cookie::get('token');
});
Route::post('more', function (Request $request) {

    $quantity = 1;
    if ($request->quantity > 100) {
        $quantity = 100;
    } else if ($request->quantity < 1) {
        $quantity = 1;
    }

    $quantity = $request->quantity;

    $response = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . Cookie::get('token')
    ])->post('long.com:8000/api/more', ['quantity' => $quantity]);
    return back();
    // dd($request->quantity);
})->name('more');



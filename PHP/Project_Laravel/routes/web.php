<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PageController;

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

Route::get('/home', [HomeController::class, 'home']);

Route::get('/nha-dat-ban', function () {
    return view('sell_re');
}) -> name('nha-dat-ban');

Route::get('/recaptcha', function() {
    return view('recaptcha');
});

Route::post('users/login', [UsersController::class, 'login']) -> name('user.login');
Route::post('users/logout', [UsersController::class, 'logout']) -> name('user.logout');
Route::post('users/store', [UsersController::class, 'store']) -> name('users.store');

Route::middleware('checkLogin')->prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'index']) -> name('users');
    Route::get('/add', [UsersController::class, 'add']);
});

Route::group([
    'prefix' => 'trang-ca-nhan',
    'middleware' => 'checkLogin'
] ,function () {
    Route::get('/', [PageController::class, 'trangCaNhan']);
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'login']);

    Route::post('/', [AdminController::class, 'checkAdminExists']) -> name('admin.checkAdminExists');

    Route::post('/add', [AdminController::class, 'checkLogin']) -> name('admin.checkLogin');

    Route::get('/edit/{id}', [AdminController::class, 'editUser']) -> name('admin.editUser');
    
    Route::post('/edit', [AdminController::class, 'handleEditUser']) -> name('admin.handleEditUser');

    Route::get('/list', [AdminController::class, 'userList']) -> name('admin.userList');
});
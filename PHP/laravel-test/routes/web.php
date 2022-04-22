<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/form', function () {
    return view('form');
});

Route::post('/post', function () {
    return '<h1 style="text-align: center;"> Post</h1>';
});

Route::get('/home', [HomeController::class, 'home']) -> name('home') -> middleware(('auth.admin'));
Route::get('clienthome', [HomeController::class, 'clienthome']) -> name('clienthome');
Route::get('san-pham', [HomeController::class, 'products']) -> name('clientproduct');
Route::get('them-san-pham', [HomeController::class, 'getAdd']);
// Route::post('them-san-pham', [HomeController::class, 'postAdd']);
Route::put('/them-san-pham', [HomeController::class, 'putAdd']);
Route::get('demo-response' , function () {
    return view('clients.response', ['title' => 'Response']);
}) -> name('demo-response'); 
Route::post('demo-response', function (Request $request) {
    if (!empty($request -> username)) {
        return back() -> withInput();
    }
});

Route::get('lay-thong-tin', [HomeController::class, 'getArr']);

Route::get('/categories', [HomeController::class, 'getCategories']) -> name('categories');
Route::get('/tin-tuc', '\HomeController@getNews') -> name('tin-tuc');

Route::get('/product', function () {
    return view('product');
});

Route::get('/fa-pro', function () {
    return view('fontawesome-6-pro');
}) -> name('fa-pro');


Route::prefix('admin') -> group(function () {
    Route::get('show-form', function () {
        return view('form');
    });

    Route::get('tin-tuc/{slug?}-{id?}.htm', function ($slug = null, $id = null) {
        return "ID: '$id' <br/> Slug: '$slug'";
    }) -> where('id','\d+') -> where('slug', '.+') -> name('admin.news');

    Route::get('show-form', function () {
        return view('form');
    }) -> name('admin.show-form');

    Route::prefix('products') -> middleware('checkpermission') -> group(function () {
        Route::get('/product', function () {
            return 'Danh sách sản phẩm';
        }) -> name('admin.product');

        Route::get('/add', function () {
            return 'Thêm sản phẩm';
        }) -> name('admin.add');

        Route::get('/remove', function () {
            return 'Xóa sản phẩm';
        }) -> name('admin.remove');

        Route::get('/edit', function () {
            return 'Sửa sản phẩm';
        }) -> name('admin.edit');
    });
});

use App\Http\Controllers\CategoriesController;
// Client Routes

Route::middleware('auth.admin') -> prefix('categories') -> group(function () {
    // Danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index']) -> name('categories.list');

    // Lấy chi tiết một chuyên mục (Áp dụng show form sửa chuyên mục)
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory']) -> name('categories.edit');

    // Xử lý update chuyên mục
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);

    // Hiển thị form add dữ liệu
    Route::get('/add', [CategoriesController::class, 'addCategory']) -> name('categories.add');

    // Xử lý thêm chuyên mục
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    // Xóa chuyên mục
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory']) -> name('categories.delete');

    // Hiển thị form upload
    Route::get('upload', [CategoriesController::class, 'getFile']);

    // Xử lý file
    Route::post('upload', [CategoriesController::class, 'handleFile']) -> name('categories.upload');
});

Route::get('san-pham/{id}', [HomeController::class, 'getProductDetail']);

// Admin Routes
Route::middleware('auth.admin') -> prefix('admin') -> group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('products', ProductsController::class) -> middleware('auth.admin.product'); 
});
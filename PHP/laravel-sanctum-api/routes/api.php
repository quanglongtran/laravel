<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('products', ProductController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);

Route::prefix('product')->group(function () {
    Route::get('search', [OrderController::class, 'search']);
});

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::get('search', [OrderController::class, 'search']);
    Route::post('more', function (Request $request) {
        
        $i = 1;
        
        while($i <= $request->quantity) {
            
            $product =  Product::create([
                'name' => 'Sản phẩm ' . $i,
                'description' => 'Đây là sản phẩm ' . $i,
                'price' => rand(0, 100) . '.000đ',
                'thumbnail' => 'https://picsum.photos/260'
            ]);

            $i++;

            if ($i >= $request->quantity) {
                return $product;
            }
        }
    });
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
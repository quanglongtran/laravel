<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SessionUser;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $token = $request -> header('token');
        $checkTokenIsValid = SessionUser::where('token', $token) -> first();
        
        if (empty($token)) {
            return response() -> json( [
                'code' => 401,
                'message' => 'Không được phép!'
            ],401);
        } else if (empty($checkTokenIsValid)) {
            return response() -> json([
                'code' => 401,
                'message' => 'Error token'
            ], 401);
        } else {
            $products = Product::all();
            return response() -> json([
                'code' => 200,
                'data' => $products
            ], 200);
        }
    }
}

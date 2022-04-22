<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function search(Request $request) {
        $result = Product::where('name', 'like', '%' . $request -> keyword . '%') -> get();
        
        if ($request -> ajax()) {
            echo '123';
        }

        return $result;
    }
}

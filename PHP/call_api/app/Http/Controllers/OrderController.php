<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function search(Request $request) {
        $response = Http::get('http://long.com:8000/api/products/search', ['keyword' => 1234]);

        // return $response;
        return $request -> keyword;
    }
}

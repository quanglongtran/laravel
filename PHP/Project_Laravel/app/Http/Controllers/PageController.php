<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function trangCaNhan()
    {
        return view('clients.trang-ca-nhan');
    }
}

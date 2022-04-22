<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $data = [];
    public function home() {
        $home = 'Home ';
        $page = [
            'page' => 'Page',
        ];
        // return view('home') -> with(['home' => $home, 'page' => $page['page']]);
        $this -> data['boolean'] = true;
        $this -> data['data'] = 'Home Page';
        $this -> data['index'] = 0;
        return view('home', $this -> data);
    }

    public function clienthome() {
        $this -> data['title'] = 'My Website';
        $this -> data['orderStatus'] = 'Failed';
        return view('clients.ClientHome', $this -> data);
    }

    public function products () {
        $this -> data['title'] = 'Sản phẩm';
        return view('clients.products', $this -> data);
    }

    public function getAdd() {
        $this -> data['title'] = 'Thêm sản phẩm';
        return view('clients.add', $this -> data);
    }

    public function postAdd(Request $request) {
        dd($request -> username);
    }

    public function putAdd(Request $request) {
        return 'Method: PUT';
        dd($request -> username);
    }

    public function getArr() {
        
    }

    public function getNews() {
        return '<h1>News List</h1>';
    }

    public function getCategories() {
        return '<h1>Categories</h1>';
    }

    public function getProductDetail($id) {
        return view('clients.products.details', compact('id'));
    }
}
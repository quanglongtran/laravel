<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(Request $request)
    {
        if($request -> is('categories')) {
            echo "ok\n";
        };
    }

    // Hiển thị danh sách thư mục (Phương thức GET)
    public function index(Request $request) {
        // $method = $request -> method();
        $input = $request -> input('id.1');
        dd($input);
        // return view('clients/categories/list');
    }

    // Lấy ra một chuyên mục theo ID (Phương thức GET)
    public function getCategory(Request $request) {
        // return view('clients/categories/edit');
        $allData = $request -> all();
        dd($allData);
    }

    // Sửa một chuyên mục (Phương thức POST)
    public function updateCategory($id) {
        return 'Submit sửa chuyên mục ' . $id;
    }

    // Show form thêm dữ liệu (Phương thức GET)
    public function addCategory(Request $request) {
        $cateName = $request -> old('category_name','Mặc định');
        echo $cateName;
        return view('clients/categories/add', compact('cateName'));
    }

    // Thêm dữ liệu vào chuyên mục (Phương thức POST)
    public function handleAddCategory(Request $request) {
        if ($request -> has('category_name')) {
            $catName = $request -> category_name;
            $request -> flash();
            return redirect(route('categories.add'));
        } else {
            echo 'Not found';
        }
        // return redirect(route('categories.add'));
        // 'Submit thêm chuyên mục';
    }

    // Xóa dữ liệu (Phương thức Delete)
    public function deleteCategory($id) {
        return 'Submit xóa chuyên mục' . $id;
    }

    public function getFile() {
        return view('clients/categories/file');
    }

    public function handleFile(Request $request) {
        if ($request -> hasFile('photo')) {
            if ($request -> photo -> isValid()){
                $file = $request -> photo;
                // $path = $file -> path();
                $ext = $file -> extension();
                $fileName = md5(uniqid()) . '.' .$ext;
                $path = $file->storeAs('file-txt', 'khoa-hoc.txt');
                dd($fileName);
            } else {
                return 'Failed!!';
            }
        } else {
            return 'Please choose your file!!';
        }
    }
}

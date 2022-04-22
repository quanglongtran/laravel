<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = json_decode(Http::withHeaders([
            'Authorization' => 'Bearer ' . Cookie::get('token'),
            'Accept' => 'application/json'
        ])->get('long.com:8000/api/products')->body());

        return view('product.product', ['data' => $product, 'token' => Cookie::get('token')]);
        // return $product->links;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . Cookie::get('token')
        ])->post('long.com:8000/api/products', [
            'name' => $request -> name,
            'description' => $request -> description,
            'price' => $request -> price,
            // 'thumbnail' => $request -> thumbnail
        ]);

        return back() -> with(['message' => 'Thêm thành công', 'type' => 'success']);
        // return json_decode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . Cookie::get('token')
        ])->put("long.com:8000/api/products/$id", $request -> all());

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . Cookie::get('token')
        ]) -> delete('long.com:8000/api/products/' . $id);

        return $response;
    }
    /**
     * Search product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) {

        // $response = Http::withHeaders([
        //     'Accept' => 'application/json',
        //     'Authorization' => 'Bearer ' . Cookie::get('token')
        // ])->get('long.com:8000/api/products/', ['name' => $request -> name]);
    }
}

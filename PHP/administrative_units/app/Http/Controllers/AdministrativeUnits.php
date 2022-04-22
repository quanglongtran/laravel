<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class AdministrativeUnits extends Controller
{
    public function city()
    {
    	$response = Http::post('http://long.com:8000/api/find_city');
    	return json_decode($response);
    }

    public function district(Request $request)
    {
    	$response = Http::post('http://long.com:8000/api/find_district', [
    			'city_code' => $request -> city_code
    		]);
    	return json_decode($response);
    }

    public function ward(Request $request)
    {
    	$response = Http::post('http://long.com:8000/api/find_ward', [
    			'district_code' => $request -> district_code
    		]);
    	return json_decode($response);
    }
}

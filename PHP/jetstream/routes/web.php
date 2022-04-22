<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
$resp = Http::get('long.com:8000/api/auth/profile', [
    'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb25nLmNvbTo4MDAwXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNjQ4MzAzODM5LCJleHAiOjE2NDgzOTAyMzksIm5iZiI6MTY0ODMwMzgzOSwianRpIjoiMG5XOXJpR3lmRk9EUHUxMiIsInN1YiI6MiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.8ys6XwiyJtg-8FuIFgUE24J9otpjIcVjPFxB0Mm-mVI'
]);
dd($resp->body());

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrativeUnits;

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

Route::get('ua', function () {
	return view('administrative_units');
});

Route::get('city', [AdministrativeUnits::class, 'city']) -> name('city');
Route::get('district', [AdministrativeUnits::class, 'district']) -> name('district');
Route::get('ward', [AdministrativeUnits::class, 'ward']) -> name('ward');
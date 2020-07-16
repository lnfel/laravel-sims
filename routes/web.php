<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

// Only return vie from routes if displaying static page
// since data or functions on controller is not passed using this route method
//Route::get('/', function() {
	//return view('login');
	//return view('tests/test');
//});

Route::get('/', 'Site@index');

Route::get('/account', 'Account@index');
Route::post('/account', 'Account@store');
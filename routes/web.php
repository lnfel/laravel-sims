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

//Route::get('/laravel', function () {
//    return view('welcome');
//});

// Only return vie from routes if displaying static page
// since data or functions on controller is not passed using this route method
//Route::get('/', function() {
	//return view('login');
	//return view('tests/test');
//});

//Route::get('/', 'Site@index')->name('/');

Route::get('/account-test', 'Account@index');
Route::post('/account-test', 'Account@store');
Route::post('/employee-test', 'Account@storeEmployee');

// Routes for default login and register of laravel-ui
//Auth::routes(['register' => false]);
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//Route::prefix('account')->group(function() {
	// Dashboard route
	//Route::get('/', 'AccountController@index')->name('account.dashboard');

	// Login routes
	//Route::get('/login', 'Auth\AccountLoginController@showLoginForm')->name('account.login');
	//Route::post('/login', 'Auth\AccountLoginController@login')->name('account.login.submit');

	// Logout route
	//Route::post('/logout', 'Auth\AccountLoginController@logout')->name('account.logout');

	// Register routes
	//Route::get('/register', 'Auth\AccountRegisterController@showRegisterForm')->name('account.register');
	//Route::post('/register', 'Auth\AccountRegisterController@register')->name('account.register.submit');

	// Password reset routes
	//Route::get('/password/reset', 'Auth\AccountForgotPasswordController@showLinkRequestForm')->name('account.password.request');
  //Route::post('/password/email', 'Auth\AccountForgotPasswordController@sendResetLinkEmail')->name('account.password.email');
  //Route::get('/password/reset/{token}', 'Auth\AccountResetPasswordController@showResetForm')->name('account.password.reset');
  //Route::post('/password/reset', 'Auth\AccountResetPasswordController@reset')->name('account.password.update');
//});

// Refactored routes

// Dashboard route
Route::get('/', 'Dashboard@index')->name('dashboard');

// Login routes
Route::get('/login', 'Auth\AccountLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\AccountLoginController@login')->name('login.submit');

// Logout route
Route::post('/logout', 'Auth\AccountLoginController@logout')->name('logout');

// Register routes
Route::get('/register', 'Auth\AccountRegisterController@showRegisterForm')->name('register');
Route::post('/register', 'Auth\AccountRegisterController@register')->name('register.submit');

// Password reset routes
Route::get('/password/reset', 'Auth\AccountForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\AccountForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\AccountResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\AccountResetPasswordController@reset')->name('password.update');

Route::get('/employee', 'Dashboard@employee')->name('dashboard.employee');
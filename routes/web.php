<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


// Login Route Start
Route::get('/', [LoginController::class, 'login_show'])->name('login.show');
Route::post('/do_login', [LoginController::class, 'do_login'])->name('do.login');
// Login Route End

//logout route start
Route::post('/do-logout', [LogoutController::class, 'do_logout'])->name('do.logout');
//logout route end


Route::group(['prefix' => 'admindashboard', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'backend.modules.profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'backend.modules.profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('backend.modules.maps');})->name('map');
	 Route::get('icons', function () {return view('backend.modules.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('backend.modules.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


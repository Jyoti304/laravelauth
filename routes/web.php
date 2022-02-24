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

Route::get('/', function () {
    return view('auth.login');
});

//auth route for both

Route::group(['middleware' => ['auth']],function(){
Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// For Users
Route::group(['middleware' => ['auth','role:user']],function(){
Route::get('/dashboard/myprofile','App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});

// For Emplo1ee1
Route::group(['middleware' => ['auth','role:employee']],function(){
Route::get('/dashboard/empcreate','App\Http\Controllers\DashboardController@empcreate')->name('dashboard.empcreate');
});
Route::get('/post_created','App\Http\Controllers\PostController@post_created');
//Route::post('/user','App\Http\Controllers\PostController')


require __DIR__.'/auth.php';

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth', 'CheckRole:users,admin']], function(){
Route::get('/profile',['middleware' =>'auth','uses' =>'ProfileController@index']);
Route::post('/profile',['middleware' =>'auth','uses' =>'ProfileController@store']);
Route::get('/profile/data_diri/{id}',['middleware' =>'auth','uses' =>'ProfileController@edit']);
Route::get('/profile/edit/{id}',['middleware' =>'auth','uses' =>'ProfileController@create']);
Route::post('/profile/edit/{id}',['middleware' =>'auth','uses' =>'ProfileController@update']);
Route::get('/profile/password',['middleware' =>'auth','uses' =>'ProfileController@password']);
Route::post('/profile/password/edit',['middleware' =>'auth','uses' =>'ProfileController@passwordupdate']);

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
Route::get('/user',['middleware' =>'auth','uses' => 'ProfileController@user']);
Route::get('/user/cariid',['middleware' =>'auth','uses' => 'ProfileController@cariid']);
Route::get('/user/cariname',['middleware' =>'auth','uses' => 'ProfileController@cariname']);
Route::get('/user/cariusername',['middleware' =>'auth','uses' => 'ProfileController@cariusername']);
Route::get('/user/carinomor',['middleware' =>'auth','uses' => 'ProfileController@carinomor']);
Route::get('/user/cariemail',['middleware' =>'auth','uses' => 'ProfileController@cariemail']);

Route::get('/admin',['middleware' =>'auth','uses' =>'AdminController@index']);
Route::get('/admin/new',['middleware' =>'auth','uses' =>'AdminController@create']);
Route::post('/admin/new',['middleware' =>'auth','uses' => 'AdminController@store']);
Route::get('/admin/edit/{id}',['middleware' =>'auth','uses' => 'AdminController@edit']);
Route::post('/admin/edit/{id}',['middleware' =>'auth','uses' => 'AdminController@update']);
Route::delete('/admin/delete/{id}',['middleware' =>'auth','uses' =>'AdminController@destroy']);

Route::get('/admin/cariid',['middleware' =>'auth','uses' => 'AdminController@cariid']);
Route::get('/admin/cariname',['middleware' =>'auth','uses' => 'AdminController@cariname']);
Route::get('/admin/cariusername',['middleware' =>'auth','uses' => 'AdminController@cariusername']);
Route::get('/admin/carinomor',['middleware' =>'auth','uses' => 'AdminController@carinomor']);
Route::get('/admin/cariemail',['middleware' =>'auth','uses' => 'AdminController@cariemail']);

Route::get('/user',['middleware' =>'auth','uses' =>'UserController@index']);
Route::get('/user/cariid',['middleware' =>'auth','uses' =>'UserController@cariid']);
Route::get('/user/cariname',['middleware' =>'auth','uses' =>'UserController@cariname']);
Route::get('/user/cariemail',['middleware' =>'auth','uses' =>'UserController@cariemail']);
Route::get('/user/carinomor',['middleware' =>'auth','uses' =>'UserController@carinomor']);
Route::get('/user/cariusername',['middleware' =>'auth','uses' =>'UserController@cariusername']);
Route::get('/user/edit/{id}',['middleware' =>'auth','uses' =>'UserController@edit']);
Route::post('/user/edit/{id}',['middleware' =>'auth','uses' =>'UserController@update']);
Route::delete('/user/delete/{id}',['middleware' =>'auth','uses' =>'UserController@destroy']);


Route::get('/activity/new/{id}',['middleware' =>'auth','uses' => 'ActvityController@create']);
Route::post('/activity/new/{id}',['middleware' =>'auth','uses' => 'ActivityController@store']);
Route::post('/status/{id}',['middleware' =>'auth','uses' => 'AdminController@status']);
});
Route::get('/booking/{id}',['middleware' =>'auth','uses' =>'BookingController@index']);
Route::get('/booking/new/{id}',['middleware' =>'auth','uses' => 'BookingController@create']);
Route::post('/booking/new/{id}',['middleware' =>'auth','uses' => 'BookingController@store']);
Route::get('/booking/edit/{id}',['middleware' =>'auth','uses' => 'BookingController@edit']);
Route::post('/booking/edit/{id}',['middleware' =>'auth','uses' => 'BookingController@update']);
Route::delete('/booking/delete/{id}',['middleware' =>'auth','uses' => 'BookingController@destroy']);
Route::group(['middleware' => ['auth', 'CheckRole:users']], function(){
Route::get('/process', ['middleware' =>'auth','uses' =>  'ProcessController@index']);
});
});

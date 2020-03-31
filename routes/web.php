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

Route::get('/posts',function(){
    return view('post');
});

Route::get('/posts/{id}',function($id){
  return view('post-single',[
    'id' => $id
  ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user','UserController@index');

Route::get('/user/delete/{id}','UserController@destroy');

Route::post('/user','UserController@store');

Route::get('chart','ChartController@index');

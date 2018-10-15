<?php

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

//首页，显示文字列表
Route::get('/home', 'HomeController@index')->name('home');

//测试，路由直接返回内容
Route::get('now', function () {
    return date("Y-m-d H:i:s");
});
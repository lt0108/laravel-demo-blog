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

//添加auth授权
Auth::routes();

//首页，显示文字列表
Route::get('/home', 'HomeController@index')->name('home');

//测试，路由直接返回内容
Route::get('now', function () {
    return date("Y-m-d H:i:s");
});


/** 后台需登录页面。定义了路由组group
 *  访问这个页面必须先登录，
    若已经登录，则将 http://127.0.0.1:8000/admin 指向 App\Http\Controllers\Admin\HomeController 的 index 方法。
    其中需要登录由 middleware 定义，/admin 由 prefix 定义，Admin 由 namespace 定义，HomeController 是实际的类名。
 */
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    //后台首页
    Route::get('/', 'HomeController@index');
    //
    Route::get('article', 'AricleController@index');
});
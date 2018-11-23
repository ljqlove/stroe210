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

//后台登录


//后台管理
Route::group([],function(){
	//后台首页
	Route::get('/admin', 'Admin\IndexController@index');

	//后台用户管理
	Route::resource('/admin/user','Admin\UserController');

	//后台评论管理
	Route::get('/admin/comment','Admin\CommentController@index');
});

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
// 前台页面

Route::get('/','Home\IndexController@index');

//前台注册
Route::any('/home/register', 'Home\RegisterController@register');
Route::any('/home/doregiste','Home\RegisterController@doregiste');
Route::any('/home/captcha','Home\RegisterController@captcha');
//前台登录
Route::get('/home/login','Home\LoginController@login');
Route::get('/home/logout','Home\LoginController@logout');

// 需要登录
Route::any('/home/myCart','Home\CartController@myCart');

//后台的首页
Route::get('/admin', 'Admin\IndexController@index');
//后台管理员管理
Route::resource('admin/blog_user', "Admin\Blog_userController");
//后台给管理员添加角色
Route::any('/admin/user_role','Admin\UserController@user_role');
Route::any('/admin/do_user_role','Admin\UserController@do_user_role');


//后台角色管理
Route::resource('admin/blog_roles', "Admin\Blog_rolesController");


//后台权限管理
Route::resource('admin/blog_permissions', "Admin\Blog_permissionsController");

//无限极分类
Route::get('/admin/getms','Admin\IndexController@getmessage');


//后台友情链接管理
Route::resource('admin/firend', "Admin\FriendController");

//后台登录
Route::any('/admin/login','Admin\LoginController@login');
Route::any('/admin/dologin','Admin\LoginController@dologin');
Route::any('/admin/captcha','Admin\LoginController@captcha');
Route::any('/admin/logout','Admin\LoginController@logout');

// 后台订单管理
Route::resource('/admin/order','Admin\OrderController');
Route::get('/admin/uajax','Admin\OrderController@unameAjax');
Route::get('/admin/oajax','Admin\OrderController@onameAjax');
Route::get('/admin/adajax','Admin\OrderController@addressAjax');
Route::get('/admin/phajax','Admin\OrderController@phAjax');
Route::get('/admin/numajax','Admin\OrderController@numAjax');
Route::get('/admin/delajax','Admin\OrderController@delAjax');


//后台友情链接管理
Route::resource('admin/firend', "Admin\FriendController");

//后台评论管理
Route::get('/admin/comment','Admin\CommentController@index');
Route::resource('/admin/comment','Admin\CommentController');

//后台轮播图管理
Route::resource('/admin/lunbo','Admin\LunboController');

// 后台客人信息管理
Route::resource('admin/message', "Admin\MessageController");
// 分类管理
Route::resource('admin/category','Admin\CategoryController');

//后台用户管理
Route::resource('/admin/user','Admin\UserController');
//后台评论管理
Route::get('/admin/comment','Admin\CommentController@index');
// 商品管理
Route::resource('admin/goods','Admin\GoodsController');



Route::get('admin/gsize/{id}','Admin\GoodsController@gsize');  // 浏览商品样式页面

Route::get('admin/gsize/admin/gsadd/{id}','Admin\GoodsController@gsadd');  // 添加商品样式页面

Route::post('/admin/gsize/save/{id}','Admin\GoodsController@gsave');  // 进行添加商品样式

Route::get('/admin/gsize/edit/{id}','Admin\GoodsController@gedit'); // 进入到商品属性修改界面

Route::post('/admin/gsize/update/{id}','Admin\GoodsController@gupdate');  // 执行商品添加方法

Route::post('/admin/gsize/del/{id}','Admin\GoodsController@gdelete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

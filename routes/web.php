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
// 无需登录
Route::get('/', function () {
    return view('home.index',['title'=>'我的购物']);
});

// 前台列表页
Route::get('/home/cate/{id}','Home\CateController@index');

// 列表详情页
Route::get('/home/goods/{id}','Home\CateController@goods');
Route::get('/home/gsize','Home\CateController@gsize');

// 需要登录
Route::any('/home/myCart','Home\CartController@myCart');



//后台的首页
Route::get('/admin', 'Admin\IndexController@index');
//后头管理员管理
Route::resource('admin/blog_user', "Admin\Blog_userController");
//后台给管理员添加角色
Route::any('/admin/user_role','Admin\UserController@user_role');
Route::any('/admin/do_user_role','Admin\UserController@do_user_role');


//后头角色管理
Route::resource('admin/blog_roles', "Admin\Blog_rolesController");

//后头权限管理
Route::resource('admin/blog_permissions', "Admin\Blog_permissionsController");


//后台友情链接管理
Route::resource('admin/firend', "Admin\FriendController");

//后台登录
Route::any('/admin/login','Admin\LoginController@login');

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
// 快讯管理
Route::resource('admin/flash','Admin\FlashController');


Route::get('admin/gsize/{id}','Admin\GoodsController@gsize');  // 浏览商品样式页面

Route::get('admin/gsize/admin/gsadd/{id}','Admin\GoodsController@gsadd');  // 添加商品样式页面

Route::post('/admin/gsize/save/{id}','Admin\GoodsController@gsave');  // 进行添加商品样式

Route::get('/admin/gsize/edit/{id}','Admin\GoodsController@gedit'); // 进入到商品属性修改界面

Route::post('/admin/gsize/update/{id}','Admin\GoodsController@gupdate');  // 执行商品添加方法

Route::post('/admin/gsize/del/{id}','Admin\GoodsController@gdelete');



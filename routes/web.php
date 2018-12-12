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
//前台注册
Route::any('/home/register', 'Auth\RegisterController@register');
Route::any('/home/doregister','Auth\RegisterController@doregister');
Route::any('/home/captcha','Auth\LoginController@captcha');
//前台登录
Route::get('/home/login','Auth\LoginController@login');
Route::get('/home/dologin','Auth\LoginController@dologin');
Route::get('/home/logout','Auth\LoginController@logout');

// 无需登录
// 前台列表页
Route::get('/','Home\IndexController@index');

Route::get('/home/stroe/{id}','Home\StroeController@stroe');


Route::get('/home/cate/{id}','Home\CateController@index');

// 列表详情页
Route::get('/home/goods/{id}','Home\GoodController@index');
Route::any('/home/ajaxgsize','Home\GoodController@ajaxgsize');

// 快讯列表页
Route::get('/home/flash','Home\FlashController@index');
Route::get('/home/content/{id}','Home\FlashController@content');

// 需要登录
Route::group(['middleware' => 'auth'], function(){

    // 加入购物车
    Route::post('/home/joinCart','Home\CartController@joinCart');
    Route::any('/home/myCart','Home\CartController@myCart');
    Route::post('/home/shopcart','Home\CartController@shopcart');
    Route::any('/home/order','Home\OrderController@order');
    Route::any('/home/addorder','Home\OrderController@addOrder');
    Route::post('/home/mess','Home\OrderController@message');

    // 收藏
    Route::get('home/collect/{id}','Home\ColController@collect');
    Route::get('home/stroedel/{ids}','Home\ColController@stroedel');
    Route::any('home/follow','Home\ColController@follow');
    Route::get('/home/join/{gid}','Home\CartController@join');

    Route::any('/home/myCollect','Home\ColController@myCollect');
    Route::post('/home/coldel','Home\ColController@coldel');
    Route::any('/home/myOrder','Home\OrderController@myOrder');
    Route::any('home/myOrderInfo/{oid}','Home\OrderController@myOrderInfo');
    // 我的店铺
    Route::get('/home/myStroe','Home\StroeController@myStroe');
    Route::get('/home/myStroeInfo/{id}','Home\StroeController@myStroeInfo');
    Route::get('/home/select','Home\StroeController@select');
    Route::post('/home/addgood','Home\StroeController@addgood');
    Route::get('/home/goodinfo/{gid}','Home\StroeController@goodinfo');
    Route::post('/home/goodcolor','Home\StroeController@goodcolor');
    Route::post('/home/goodsize','Home\StroeController@goodsize');
    Route::post('/home/good-up/{gid}','Home\StroeController@goodup');
    // 商家入驻
    Route::get('/home/Merchant','Auth\RegisterController@Merchant');
    Route::get('/home/Merchant_2','Auth\RegisterController@Merchant_2');
    Route::post('/home/Merchant_3','Auth\RegisterController@Merchant_3');
    Route::post('/home/checkphone','Auth\RegisterController@checkphone');
    Route::get('/home/checkcode','Auth\RegisterController@checkcode');
    //前台个人中心主页
    Route::get('/home/wjd/message','Home\MessageController@index');
    //前台个人信息修改
    Route::any('/home/wjd/ajaxmessageEdit','Home\MessageController@ajaxmessageEdit');
    // 个人信息头像修改
    Route::any('/home/wjd/message/ajaxupdate','Home\MessageController@ajaxupdate');

    //地址管理
    Route::get('/home/wjd/address','Home\AddressController@index');
    Route::any('/home/wjd/dostatus','Home\AddressController@dostatus');
    Route::any('/home/wjd/ajaxedit','Home\AddressController@ajaxedit');
    Route::any('/home/wjd/ajaxupdate','Home\AddressController@ajaxupdate');
    Route::any('/home/wjd/ajaxadd','Home\AddressController@ajaxadd');
    Route::any('/home/wjd/ajaxdeletes','Home\AddressController@ajaxdeletes');

    // 前台个人中心账户安全
    Route::get('/home/security/{id}','Home\MessageController@user_security');
    Route::get('/home/security/pw/{id}','Home\MessageController@user_pw');
    // 修改密码
    Route::post('/home/set_password','Home\MessageController@set_password');
    // 修改密码前的密保问题验证
    Route::get('/home/pro_pw','Home\MessageController@pro_pw');
    Route::post('/home/yz_pw','Home\MessageController@yz_pw');

    // 密保问题
    Route::get('/home/propass/{id}','Home\MessageController@propass');
    Route::post('/home/set_propass','Home\MessageController@set_propass');
    // 修改密保前的密保问题验证
    Route::get('/home/pro_mb','Home\MessageController@pro_mb');
    Route::post('/home/yz_mb','Home\MessageController@yz_mb');
    Route::post('/home/uppropass','Home\MessageController@uppropass');
});


//后台登录
Route::any('/admin/login','Admin\LoginController@login');
Route::any('/admin/dologin','Admin\LoginController@dologin');
Route::any('/admin/captcha','Admin\LoginController@captcha');
Route::any('/admin/logout','Admin\LoginController@logout');

Route::group(['middleware'=>['login','userper']], function(){
//后台的首页
Route::get('/admin', 'Admin\IndexController@index');
//后台管理员管理
Route::resource('admin/blog_user', "Admin\Blog_userController");
//后台给管理员添加角色
Route::any('/admin/user_role','Admin\Blog_userController@user_role');
Route::any('/admin/do_user_role','Admin\Blog_userController@do_user_role');


//后台角色管理
Route::resource('admin/blog_roles', "Admin\Blog_rolesController");
//给后台角色添加权限
Route::any('/admin/role_per','Admin\Blog_rolesController@role_per');
Route::any('/admin/do_role_per','Admin\Blog_rolesController@do_role_per');


//后台权限管理
Route::resource('admin/blog_permissions', "Admin\Blog_permissionsController");

//无限极分类
Route::get('/admin/getms','Admin\IndexController@getmessage');


//后台友情链接管理
Route::resource('admin/firend', "Admin\FriendController");

// 后台订单管理
Route::resource('/admin/order','Admin\OrderController');
Route::get('/admin/uajax','Admin\OrderController@unameAjax');
Route::get('/admin/oajax','Admin\OrderController@onameAjax');
Route::get('/admin/adajax','Admin\OrderController@addressAjax');
Route::get('/admin/phajax','Admin\OrderController@phAjax');
Route::get('/admin/numajax','Admin\OrderController@numAjax');
Route::get('/admin/delajax','Admin\OrderController@delAjax');

Route::resource('/admin/stroe','Admin\StroeController');
Route::get('/admin/stroesub2/{id}','Admin\StroeController@stroesub2');
Route::post('/admin/ajaxstroe/{id}','Admin\StroeController@ajaxstroe');

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
//后台站点
Route::any('admin/site','Admin\SiteController@edit');
Route::any('admin/do_site','Admin\SiteController@update');
//后台系统日志
Route::resource('admin/system','Admin\SystemController');


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
});

Route::get('/admin/remind','Admin\RemindController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

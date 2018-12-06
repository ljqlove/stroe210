<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Message;
use App\Model\Admin\Comment;
use DB;
use Session;

class LoginController extends Controller
{
    //
    /**
     *  临时的  全部都可删除
     *
     *  @return \Illuminate\Http\Response
     */


    public function doLogin()
    {
    	// $message = Message::find(2);
    	$user = Comment::find(3);
    	// dd($user);
		session(['uid'=>$user->uid]);
		// session(['uid'=>$rs->id]);


    	// dd($message);
    	return redirect('/');
    }

    public function logout()
    {
    	session(['uid'=>'']);

    	return redirect('/');
    }


class LoginController extends Controller
{
    /**
     *  显示登录页面
     *
     *  @return \Illuminate\Http\Response
     */
    public function login()
    {
    	return view('home.login',['title'=>'立即登录']);
    }

    /**
     *  处理登录的方法
     *
     *  @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
    	//表单验证

    	//判断用户名
    	$rs = DB::table('users')->where('phone',$request->phone)->first();

    	if(!$rs){

    		return back()->with('error','用户名或者密码错误');
    	}

    	//判断密码
    	//hash
    	if (!\Hash::check($request->password, $rs->password)) {

		    return back()->with('error','用户名或者密码错误');
		}

		//存点信息  session
		session(['uid'=>$rs->uid]);
		session(['phone'=>$rs->phone]);


		return redirect('/');

    }

    //退出
    public function logout()
    {
        //清空session
        session(['uid'=>'']);
        session(['phone'=>'']);

        return redirect('/home/login');
    }
}

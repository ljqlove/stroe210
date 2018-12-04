<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    	$rs = DB::table('comment')->where('phone',$request->phone)->first();


    	if(!$rs){

    		return back()->with('error','用户名或者密码错误');
    	}

    	//判断密码
    	//hash
    	if (!Hash::check($request->password, $rs->password)) {
		    
		    return back()->with('error','用户名或者密码错误');
		}

		//存点信息  session
		session(['uid'=>$rs->id]);
		session(['phone'=>$rs->phone]);

		return redirect('/');
    	
    }

    //退出
    public function logout()
    {
        //清空session
        session(['uid'=>'']);

        return redirect('/home/login');
    }
}

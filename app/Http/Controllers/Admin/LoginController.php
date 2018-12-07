<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session;
use DB;
use Hash;

class LoginController extends Controller
{
    /**
     * 显示登录页面
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
    	return view('admin/login',['title'=>'后台登录']);
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
    	$rs = DB::table('blog_user')->where('user_name',$request->user_name)->first();

    	if(!$rs){

    		return back()->with('error','用户名或者密码错误');
    	}

    	//判断密码
    	//hash
    	if (!Hash::check($request->user_pass, $rs->user_pass)) {
		    
		    return back()->with('error','用户名或者密码错误');
		}

		//判断验证码
		$code = session('code');

		if($code != $request->code){
		    return back()->with('error','验证码错误');
		}

		//存点信息  session
		session(['uid'=>$rs->user_id]);
		session(['user_name'=>$rs->user_name]);
		session(['user_pic'=>$rs->user_pic]);
		$map['uid'] = session('uid');
        $map['created_at'] = date('Y-m-d H:i:s',time());
    	$result = DB::table('system')->insert($map);


		return redirect('/admin');
		}
		/**
     *  验证码
     *
     *  @return \Illuminate\Http\Response
     */
	    public function captcha()
	    {
	        $phrase = new PhraseBuilder;
	        // 设置验证码位数
	        $code = $phrase->build(4);
	        // 生成验证码图片的Builder对象，配置相应属性
	        $builder = new CaptchaBuilder($code, $phrase);
	        // 设置背景颜色
	        $builder->setBackgroundColor(123, 203, 230);
	        $builder->setMaxAngle(25);
	        $builder->setMaxBehindLines(0);
	        $builder->setMaxFrontLines(0);
	        // 可以设置图片宽高及字体
	        $builder->build($width = 90, $height = 35, $font = null);
	        // 获取验证码的内容
	        $phrase = $builder->getPhrase();
	        // 把内容存入session
	        session(['code'=>$phrase]);
	        // 生成图片
	        header("Cache-Control: no-cache, must-revalidate");
	        header("Content-Type:image/jpeg");
	        $builder->output();
	    }

		//退出
	    public function logout()
	    {
	    	//清空session
	    	session(['user_name'=>'']);
			session(['user_pic'=>'']);

	    	return redirect('/admin/login');
	    }
}

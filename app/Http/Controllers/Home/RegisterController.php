<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Model\Admin\Comment;
use Hash;

class RegisterController extends Controller
{
    public function register()
    {
    	return view('home.register',['title'=>'用户的注册页面']);
    }

    public function doregiste(Request $request)
    {
            // 规则
            $this->validate($request, [
                'phone' => 'required|regex:/^1[3456789]\d{9}$/',
                'password' => 'required|regex:/^\S{5,12}$/',
                'repassword'=>'same:password',
                'code'=>'required'
            ],[
                'phone.required' => '请输入手机号',
                'phone.regex' => '手机号格式不正确',
                'password.required' => '请输入密码',
                'password.regex' => '密码格式不正确',
                'repassword.same' => '两次输入密码不一致',
                'vode.required' => '请输入验证码',
                // 'captcha.captcha' =>'请输入正确的验证码'
            ]);

            $res = $request->except('_token','repass','captcha');

            //往数据表里面添加数据  hash加密
        	$res['password'] = Hash::make($request->password);
        	$res['inputtime'] = date('Y-m-d H:i:s',time());

            //存储数据

            $data = Comment::create($res);

            if($data){
                return redirect('/home/login')->with('success','注册成功');
            }else{
            	return back()->with('error','注册失败');
            }

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
        session(['captcha'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }
}

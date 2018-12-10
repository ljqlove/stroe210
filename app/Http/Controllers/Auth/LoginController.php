<?php

namespace App\Http\Controllers\Auth;

use Gregwar\Captcha\CaptchaBuilder; //验证码
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Gregwar\Captcha\PhraseBuilder;
use App\Model\Admin\User;
use session;
use DB;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function login()
    {
        return view('home.auth.login');
    }

    public function dologin(Request $request)
    {
        $res = $request -> except('code','_token');
        //表单验证
        //判断用户名
        $rs = DB::table('users')->where('phone',$request->phone)->first();

        if(!$rs){

            return back()->with('error','用户名输入错误');
        }

        //判断密码
        //hash
        if (!Hash::check($request->password, $rs->password)) {

            return back()->with('error','密码输入错误');
        }
        // dd($rs);

        //判断验证码
        $code = session('code');
        if($code != $request->code){
            return back()->with('error','验证码错误');
        }
        //存点信息  session
        // dd($rs->uid);

        $userinfo = ['uid'=>$rs->uid,'phone'=>$rs->phone,'auth'=>$rs->auth,'status'=>$rs->status];
        session(['userinfo'=>$userinfo]);
        $uid = $rs->uid;
        session(['uid'=>$uid]);

        return redirect('/');

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

    /**
     * Create a new controller instance.
     * 退出
     * @return void
     */

    public function logout()
    {
        //清空session
        session(['userinfo'=>'']);

        return redirect('/home/login');
    }
}

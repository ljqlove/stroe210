<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Lib\Ucpaas; //手机验证码
use App\Model\Admin\User;
use Gregwar\Captcha\PhraseBuilder;
use DB;
use Hash;
class RegisterController extends Controller
{

    /**
     * 会员注册
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register()
    {
        return view('home.auth.register');
    }

    public function doregister(Request $request)
    {
        // 规则
        $this->validate($request, [
            'phone' => 'regex:/^1[3456789]\d{9}$/',
            'password' => 'regex:/^\S{5,12}$/',
            'repassword'=>'same:password',
        ],[
            'phone.regex' => '手机号格式不正确',
            'password.regex' => '密码格式不正确',
            'repassword.same' => '两次输入密码不一致',
        ]);
        //判断验证码
        $code = session('code');

        if($code != $request->code){
            return back()->with('error','验证码错误');
        }
        $res = $request->except('_token','repassword','code');

        //往数据表里面添加数据  hash加密
        $res['password'] = Hash::make($request->password);
        $res['inputtime'] = date('Y-m-d H:i:s',time());

        //存储数据

        $uid = User::insertGetId($res);
        $res = DB::table('message')->insert(['uid'=>$uid]);

        if($res){
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


    /**
     * 店铺注册
     *
     * @param  array  $data
     * @return \App\User
     */
    public function Merchant()
    {
        return view('home.ljq.Merchant');
    }

    public function Merchant_2()
    {
        return view('home.ljq.Merchant_2');
    }

    public function Merchant_3(Request $request)
    {

        $this->validate($request, [
                'company'=>'required|unique:stores'
            ],[
                'company.unique'=>'！！您的店铺名已经存在！！',
                'company.required'=>'！！请输入店铺名！！'
            ]);
        $uid = session('userinfo')['uid'];

        $data = $request -> except('password','code','_token');
        $data['create_at'] = date('Y-m-d H:i:s',time());
        // dd($data);
        $data['uid'] = $uid;
        $res = DB::table('stores')->insert($data);
        if ($res) {
            return view('home.ljq.Merchant_3')->with('info','申请已经提交');
        } else {
            return back()->with('info','申请失败,请您重新填写');
        }
    }

    public function checkphone(Request $request)
    {
        $number = $request->post('number');

        $options['accountsid']='863b17f6a3846c92edd0a837088db3b5';
        $options['token']='2eb1f6c22332de9eb5ccaf64f157baa8';

        $ucpass = new Ucpaas($options);

        // $ucpass->getDevinfo('xml');

        //验证码
        $code = rand(111111,999999);

        //session
        session(['code'=>$code]);

        $appId = "985fddd141454a978d48cf9dd4cccfd5";

        $templateId = "30047";
        // $param=$code;

        $ucpass->templateSMS($appId,$number,$templateId,$code);

        echo $code;
    }

    public function checkcode(Request $request)
    {
        $code = $request->get('code');

        $cd = session('code');
        // echo $cd;
        //比较   跟手机收到的验证码作比较
        if($code == $cd){

            echo 1;
        } else {
            echo 0;
        }

    }
}

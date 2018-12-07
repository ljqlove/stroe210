<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\User;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Illuminate\Support\Facades\Hash;
use App\Model\Home\Propass;

class MessageController extends Controller
{
    /**
     *  前台个人中心
     *
     *  @return \Illuminate\Http\Response
     */
   	public function index()
   	{
   		// dd(1);
   		return view('home/wjd/message',[
   			'title'=>'个人中心']);
   	}


    public function ajaxmessageEdit()
    {
        $mid = strip_tags($_POST['mid']);
        $map['uname'] = strip_tags($_POST['uName']);
        $map['mname'] = strip_tags($_POST['mName']);
        $map['sex'] = strip_tags($_POST['checked']);
        $result = DB::table('message')->where('mid', $mid)->update($map);
        if($result){
          $a['status'] = 1;
          echo json_encode($a);
        } else {
          $a['status'] = 2;
          echo json_encode($a);
        }
    }
    
    // 账户安全界面
    public function user_security($id)
    {
      // echo '账户安全页面用户ID为'.$id;

      $users = DB::select('select * from users where uid='.$id);

      // dd($users);
      return view('home/security',[
        'title'=>'账户安全页面',
        'users'=>$users
      ]);

    }

    // 账户修改密码界面
    public function user_pw($id)
    {
        // echo '这是用户的ID'.$id;
      $users = User::find($id);
      // $users = DB::select('select * from users where uid='.$id);
      // $users = User::where('uid', $id)->get();
      // $userpw = [];
      // dd($users[0]['pass']);
      // dd($users['password']);  // 数据库原密码数据

      // 判断是否有密保问题如果有跳转到密保问题页面
      $props = Propass::where('uid',$id)->first();
      // dd($props['ptitle']);
      if ($props) {
        return view('home.pro_pw',[
            'title'=>'验证密保问题',
            'id'=>$id,
            'props'=>$props,
        ]);
      }
      return view('home.set_password',[
        'title'=>'修改密码页面',
        'id'=>$id,
      ]);
      // dd($userpw['0']['password']);
    }


    // 重置密码方法
    public function set_password(Request $request){
      // $id = Auth::User()->id;
      $id = $request->input('id');
      $oldpassword = $request->input('oldpassword');
      $newpassword = $request->input('newpassword');
      $res = DB::table('users')->where('uid',$id)->select('password')->first();
      if(!Hash::check($oldpassword, $res->password)){
          echo 2;
          exit;//原密码不对
      }
      $update = array(
        'password'  =>bcrypt($newpassword),
      );
      $result = DB::table('users')->where('uid',$id)->update($update);
      if($result){
        $users = DB::select('select * from users where uid='.$id);
        $status = '1';
        // dd($users);
        return view('home/security',[
          'title'=>'账户安全页面',
          'users'=>$users,
          'status'=>$status,
        ]);
      }else{
        $status = '2';
        // echo '修改失败';exit;
      }

    }

    // 密保问题
    public function propass($id)
    {
      // $request ->
      // echo '再次修改密保问题';

      $props = Propass::where('uid',$id)->first();
      // 判断如果有密保则先验证密保问题在修改密保
      if ($props) {
         return view('home.pro_mb',[
            'title'=>'验证密保问题',
            'id'=>$id,
            'props'=>$props,
        ]);
      }
      
      return view('/home/propass',[
          'title'=>'密保设置',
          'id'=>$id
      ]);
    }

    // 添加密保问题
    public function set_propass(Request $request)
    {
      $req = [];
      $req['uid'] = $request->input('id');
      // echo $id;

      $req['ptitle'] = $request->input('ptitle');
      $req['pcontent'] = $request->input('pcontent');

      // dd($req);
      $props = Propass::create($req);
      if ($props) {
        echo '添加成功';exit;
      } else {
        echo '添加失败';exit;
      }
      // echo $ptitle;
      // echo $pcontent;
      // echo '设置密保问题';

    }
    

    // 修改密码验证密保问题
    public function yz_pw(Request $request)
    {

      $id = $request->input('id');
      $pcontent = $request->input('pcontent');
      $res = Propass::where('uid', $id)->get();
      // dd($res);
      foreach ($res as $k => $v) {
        $oldpcontent = $v['pcontent'];
      }
      if($oldpcontent == $pcontent){
       return view('home.set_password',[
        'title'=>'修改密码页面',
        'id'=>$id,
      ]);
      } else {
        $users = DB::select('select * from users where uid='.$id);

        // dd($users);
        return view('home/security',[
          'title'=>'账户安全页面',
          'users'=>$users
        ]);
      }

    }

    // 修改密保验证密保问题
    public function yz_mb(Request $request)
    {

      $id = $request->input('id');
      $pcontent = $request->input('pcontent');
      $res = Propass::where('uid', $id)->get();
      // dd($res);
      foreach ($res as $k => $v) {
        $oldpcontent = $v['pcontent'];
      }
      if($oldpcontent == $pcontent){
       return view('/home/propass',[
        'title'=>'修改密保页面',
        'id'=>$id,
      ]);
      } else {
        $users = DB::select('select * from users where uid='.$id);

        // dd($users);
        return view('home/security',[
          'title'=>'账户安全页面',
          'users'=>$users
        ]);
      }

    }


    // 重置密保方法
     public function uppropass(Request $request){
      // $id = Auth::User()->id;
      $id = $request->input('id');

      $new = [];
      $new['ptitle'] = $request->input('ptitle');
      $new['pcontent'] = $request->input('pcontent');
     

      $result = DB::table('propass')->where('uid',$id)->update($new);
      if($result){
        $users = DB::select('select * from users where uid='.$id);

        // dd($users);
        return view('home/security',[
          'title'=>'账户安全页面',
          'users'=>$users
        ]);
      }else{
          echo '修改失败';exit;
      }

    }
}

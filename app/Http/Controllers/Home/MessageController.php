<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

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

    /**
     *  修改基本资料
     *
     *  @return \Illuminate\Http\Response
     */
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


    /**
     *  修改头像
     *
     *  @return \Illuminate\Http\Response
     */
    public function ajaxupdate(Request $request)
    {
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000)){
            if ($_FILES["file"]["error"] > 0){
                  $info['status'] = 2;
                  $info['msg'] = '未知错误';
                  return json_encode($info);
              dd(2);

            }else{
              $name = rand(111,999).time();
              $path = './images/message/uploads/';
              if(!file_exists($path)){
                  mkdir ( "$path",0777,true);
              }
              $huzui = substr($_FILES["file"]["name"],strripos($_FILES["file"]["name"],".")+1);

              $filename = $path.$name.'.'.$huzui;
              $result = move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
              $picname = '/images/message/uploads/'.$name.'.'.$huzui;
              $map['headpic'] = $picname;
              $result = DB::table('message')->where('uid', session('uid'))->update($map);
              $info['status'] = 1;
              $info['msg'] = '上传成功';
              $info['mpic'] = $map['headpic']; 
              return json_encode($info);
            }
        } else {
          dd(1);
            $info['status'] = 2;
            $info['msg'] = '文件类型或者大小不正确';
            return json_encode($info);

        }

    }
      
    
    	
}

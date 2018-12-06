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
    
    	
}

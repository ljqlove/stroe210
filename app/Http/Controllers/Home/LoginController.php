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

}

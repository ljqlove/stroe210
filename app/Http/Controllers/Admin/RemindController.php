<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemindController extends Controller
{
    //
    /**
     *  显示没有权限的界面
     *
     *  @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('admin.remind.remind',['title'=>'用户权限提示界面']);
    }


}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     *  后台首页
     *
     *  @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('admin.index',['title'=>'Store网站后台首页']);
    }
    	

}

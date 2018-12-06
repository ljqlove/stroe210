<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;

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
    	
    public static function getCategoryMessage($pid)
    {
        $cate = Category::where('pid',$pid)->get();
        $arr = [];

        foreach($cate as $k=>$v){

            if($v->pid==$pid){

                $v->sub=self::getCategoryMessage($v->tid);

                $arr[]=$v;
            }
           
        }  
         return $arr;
    }
}

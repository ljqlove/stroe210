<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Site;
use  App\Model\Admin\Flash;
class IndexController extends Controller
{
    //
    public function index()
    {	
    	// 引入友情链接
    	$friends = DB::table('friends')->get();
        // 引入商城快讯
        $flash = DB::table('shopflash')->get();

        // dd()
    	// 引入站点设置
        $site = Site::find(1);
        

    	return view('home.index',[
    		'friends' => $friends,
    		'site'=>$site,
            'flash'=>$flash,
    	]);
    }

}

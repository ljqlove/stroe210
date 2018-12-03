<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Site;
class IndexController extends Controller
{
    //
    public function index()
    {	
    	// 引入友情链接
    	$friends = DB::table('friends')->get();

    	// 引入站点设置
    	$site = DB::table('site')->get();
        $site = Site::find(1);

    	// dd($friends);
    	// dd($site);
    	return view('home.index',[
    		'friends' => $friends,
    		'site'=>$site,
    	]);
    }

}
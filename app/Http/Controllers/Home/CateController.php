<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use DB;

use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
use App\Model\Admin\Gsize;

class CateController extends Controller
{
    public function index($id)
    {
    	// dd($id);
    	$goods = Goods::where('tid',$id)->get();
    	$cates = Category::where('tid',$id)->get();

    	$arr = [];
    	foreach ($goods as $k => $v) {
    		$arr[] = $v->gid;
    	}
    	$gimgs = Gsize::where('gid',$arr)->get();
    	// dd($arr);
    	// foreach ($gimgs as $k => $v) {
    	// 	echo $v->gid;die;
    	// }

    	// dd($gimgs);

    	return view('home.cate',[
            'title'=>'类别',
            'goods'=>$goods,
            'cates'=>$cates,
            'gimgs'=>$gimgs
        ]);
    }
}

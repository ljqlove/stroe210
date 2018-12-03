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
    public function index(Request $request , $id)
    {
    	// dd($id);
    	$res = Goods::orderBy('gid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $gname = $request->input('gname');
               
                //如果用户名不为空
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
              
            })
        ->paginate($request->input('num', 5));

    	$goods = Goods::where('tid',$id)->get();
    	$cates = Category::where('tid',$id)->get();

    	$arr = [];
    	foreach ($goods as $k => $v) {
    		$arr[] = $v->gid;
    	}


    	$gimgs = Gsize::where('gid',$arr)->get();
    	// dd($arr);
    

    	// dd($gimgs);

    	return view('home.cate',[
            'title'=>'类别',
            'res'=>$res,
            'cates'=>$cates,
            'request'=>$request,
            'gimgs'=>$gimgs,
            'goods'=>$goods
        ]);
    }

    public function goods($id)
    {
        $goods = Goods::where('gid',$id)->get(); // 商品

        $gimgs = Goodsimg::where('gid',$id)->get(); // 商品图片

        $gsize = Gsize::where('gid',$id)->get();

        // dd($gsize);

        // dd($gimgs);
    	return view('home.goods',[
    		'title'=>'商品详情页',
    		'goods'=>$goods,
            'gimgs'=>$gimgs,
            'gsize'=>$gsize
    	]);
    }

    public function gsize(Request $request)
    {
        echo '111';
    }
}

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


    	return view('home.cate',[
            'title'=>'类别',
            'res'=>$res,
            'cates'=>$cates,
            'request'=>$request,
            'gimgs'=>$gimgs
        ]);
    }

    public function goods($id)
    {
        $goods = Goods::where('gid',$id)->get(); // 商品

        $gimgs = Goodsimg::where('gid',$id)->get(); // 商品图片

        $gsize = Gsize::where('gid',$id)->get();

        $comment = DB::table('comment')->get();


        // dd($gsize);

        // dd($gsize);
        $size = [];
        foreach ($gsize as $k => $v) {
            // var_dump($v['gsize']);
             $size[] = explode(',', $v['gsize']);
        }
        // dd($size);
    	return view('home.goods',[
    		'title'=>'商品详情页',
    		'goods'=>$goods,
            'gimgs'=>$gimgs,
            'gsize'=>$gsize,
            'comment'=>$comment

    	]);
    }

    public function ajaxgsize()
    {
        $sid = $_POST['sid'];

        $result = DB::select('select * from shopsize where id ='.$sid);
        dd($result);
        if ($result) {
            $a['list'] = $result;
            $a['status'] = 1;
            echo json_encode($a);
        } else {
            $a['status'] = 2;
            echo json_encode($a);
        }
    }
}

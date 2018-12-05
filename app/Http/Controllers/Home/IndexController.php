<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Lunbo;
use App\Model\Admin\Goods;
use App\Model\Admin\Site;
use DB;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $rs = $request->input('gname');
        $good=Goods::where('gname','like','%'.$rs.'%')->get();
        $lunbo = DB::table('lunbo')->get();
        $goods = DB::table('goods')->get();
        // 引入友情链接
        $friends = DB::table('friends')->get();

        // 引入站点设置
        $site = DB::table('site')->get();
        $site = Site::find(1);
        return view('home.index',[
            'lunbo'=>$lunbo,
            'good'=>$good,
            'goods'=>$goods,
            'friends' => $friends,
            'site'=>$site,
            'title'=>'歪秀购物'
        ]);
    }
}

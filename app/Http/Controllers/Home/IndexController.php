<?php


namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Lunbo;
use App\Model\Admin\Goods;
use App\Model\Admin\Site;
use  App\Model\Admin\Flash;
use DB;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {

        $rs = $request->input('gname');
        $good=Goods::where('gname','like','%'.$rs.'%')->get();
        $lunbo = DB::table('lunbo')->get();
        $goods = DB::table('goods')->get();
        // 引入友情链接
        $friends = DB::table('friends')->get();
        // 引入商城快讯
        $flash = DB::table('shopflash')->get();


        // 引入商城快讯
        $flash = DB::table('shopflash')->get();

        // 引入站点设置
        $site = Site::find(1);

        return view('home.index',[
            'friends' => $friends,
            'good'=>$good,
            'goods'=>$goods,
            'friends' => $friends,
            'flash'=>$flash,
            'site'=>$site,
            'lunbo'=>$lunbo,
        ]);
    }
}
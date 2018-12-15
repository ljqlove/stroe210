<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use DB;

use App\Model\Admin\Goods;
use App\Model\Admin\Gcolor;
use App\Model\Admin\Gsize;
class GoodController extends Controller
{
    public function index($id)
    {
        $goods = Goods::find($id); // 商品

        $gcolor = Gcolor::where('gid',$id)->get(); // 商品图片

        $gsize = Gsize::where('gid',$id)->get();

        $comment = DB::table('comment')->where('gid',$id)->get();

        $type = DB::table('type')->where('pid',0)->get();

        $sid = $goods->company;
        // 店铺信息
        $stroe = DB::table('stores')->where('id',$sid)->first();
        // dd($stroe);
        // dd($goods,$gsize,$gcolor,$comment);
        $advert = DB::select('select * from advert');

        return view('home.goods',[
            'title'=>'商品详情',
            'goods'=>$goods,
            'gcolor'=>$gcolor,
            'gsize'=>$gsize,
            'stroe'=>$stroe,
            'type'=>$type,
            'advert'=>$advert,
            'comment'=>$comment
        ]);
    }

    public function ajaxgsize(Request $request)
    {
        $id = $request->sid;
        $price = DB::table('gsize')->where('id',$id)->value('price');
        echo $price;
    }
}

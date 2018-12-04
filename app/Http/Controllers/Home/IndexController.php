<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Lunbo;
use App\Model\Admin\Goods;
use DB;

class IndexController extends Controller
{

    public function index(Request $request)
    {
        $good=Goods::where('gname','like','%'.'gname'.'%')->get();
        $lunbo = DB::table('lunbo')->get();
        $goods = DB::table('goods')->get();
        return view('home.index',[
            'lunbo'=>$lunbo,
            'good'=>$good,
            'goods'=>$goods,
            'title'=>'歪秀购物'
        ]);
    }
}

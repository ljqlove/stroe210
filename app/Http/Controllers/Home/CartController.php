<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\User;
use App\Model\Admin\Goods;
use App\Model\Home\Collect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示购物车
     * @author ljq
     * @return \Illuminate\Http\Response
     */
    public function myCart()
    {

        $cart = DB::table('cart')->where('uid','3')->get();
        return view('home.ljq.myCart',['title'=>'我的购物车','cart'=>$cart]);
    }

    /**
     * Display a listing of the resource.
     * 购物车物品删除
     * @author ljq
     * @return \Illuminate\Http\Response
     */
    public function shopcart(Request $request)
    {
        $cid = $request->gid;

        $res = DB::table('cart')->where('cid',$cid)->delete();

        // $count = DB::table('cart')->count();

        if($res){

            echo 1;
        } else {

            echo 0;
        }
        // echo $cid;
    }

    public function join(Request $request,$gid)
    {

    }


}

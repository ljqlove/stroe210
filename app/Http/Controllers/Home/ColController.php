<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\User;
use App\Model\Admin\Goods;
use App\Model\Home\Collect;

class ColController extends Controller
{
    //

    public function myCollect(Request $request)
    {
        $gname = '%%';
        if ($request ->gname) {
            $gname = '%'.($request->gname).'%';
        }

        $uid = session('userinfo')['uid'];
        $user = User::find($uid);
        $goods = $user->goods()
        ->where('gname','like',$gname)
        ->paginate(8);

        return view('home.ljq.myCollect',['title'=>'我的收藏','goods'=>$goods])->with('success','123');
    }

    public function coldel(Request $request)
    {
        $uid = session('userinfo')['uid'];
        $user = User::find($uid);
        $gids = $request -> good;
        $res = $user -> goods() -> detach($gids);
        if ($res) {
            return back() -> with('success','成功移出收藏');
        } else {
            return back() -> with('error','删除失败');
        }
    }

    public function follow(Request $request)
    {
        // 获取购物车id
        $cid = $request -> gid;
        // 将改商品移出购物车
        $del = DB::table('cart')->where('cid',$cid)->delete();
        if ($del) {
            $gname = DB::table('cart')->where('cid',$cid)->value('gname');
            // 获取商品id
            $gid = Goods::where('gname',$gname)->value('gid');
            $res = Collect::insert(['uid'=>3,'gid'=>$gid]);
            if ($res) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }


}

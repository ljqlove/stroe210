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
        $stroe = $user->stroes()->get();
        // dd($stroe);
        return view('home.ljq.myCollect',['title'=>'我的收藏','goods'=>$goods,'stroe'=>$stroe]);
    }

    public function collect($id)
    {
        $uid = session('userinfo')['uid'];
        $res = Collect::insert(['uid'=>$uid,'sid'=>$id]);

        if ($res) {
            return back()->with('error','收藏成功');
        } else {
            return back()->with('error','收藏失败');
        }
    }
    public function stroedel(Request $request,$ids)
    {

        $uid = session('userinfo')['uid'];
        $user = User::find($uid);
        $id = ltrim($ids,',');
        $sid = explode(',',$id);
        $res = $user -> stroes() -> detach($sid);
        if($res) {
            return back()->with('error','成功移出收藏');
        } else {
            return back() -> with('error','删除失败');
        }
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
        $uid = session('userinfo')['uid'];
        // 获取购物车id
        $cid = $request -> gid;
        $gname = DB::table('cart')->where('cid',$cid)->value('gname');
        // 获取商品id
        $gid = Goods::where('gname',$gname)->value('gid');
        $res = Collect::insert(['uid'=>$uid,'gid'=>$gid]);
        if ($res) {
            // 将改商品移出购物车
            $del = DB::table('cart')->where('cid',$cid)->delete();

            echo 1;
        } else {
            echo 0;
        }
    }


}

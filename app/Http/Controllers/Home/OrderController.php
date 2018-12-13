<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\User;
use App\Model\Admin\Goods;
use App\Model\Home\Collect;
use App\Model\Home\Order;


class OrderController extends Controller
{
    // 审核订单页
    public function order(Request $request)
    {
        if (empty($request->cid)) {
             return ('<script>location.href="/home/addorder"</script>');
        }

        $uid = session('userinfo')['uid'];
        $cids = $request -> cid;
        $qtys = $request -> qty;
        // dd($cids,$qtys);
        $data = [];
        $re = '';

        // 组合成订单数据
        for ($i=0; $i < count($cids); $i++) {
            $data['uid'] = $uid;
            $cid = $cids[$i];
            $num = $qtys[$i];
            $data['num'] = $qtys[$i];
            // 获取订单信息
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $res = '';
            for ($j=0; $j < 4; $j++) {
                $res .= $str[ mt_rand(0,(strlen($str)-1))];
            }
            $ornum = $res.time();

            $data['ordernum'] = $ornum;
            $shop = DB::table('cart') -> where('cid',$cid) -> first();
            // dd($shop);
            $data['oname'] = $shop->gname;
            $data['total'] = ($shop->price)*$num;
            $data['color'] = $shop->color;
            $data['size'] = $shop->size;
            $data['opic'] = $shop->gimg;
            $add = DB::table('address') -> where('uid','3') ->where('status','1') -> first();
            // dd($add);
            $data['addid'] = $add['aid'];
            $data['inputtime'] = date('Y-m-d H:i:s',time());
            // 删除购物车商品信息
            $rs = DB::table('cart')->where('cid',$cid)->delete();
            $re .= Order::insertGetId($data).',';
        }
        $aa = rtrim($re,',');
        // 插入数据
        if ($re) {
            return ('<script>location.href="/home/addorder/'.$aa.'"</script>');
        }
    }

    // 创建订单
    public function addOrder(Request $request,$ids)
    {
        $da = explode(',',$ids);
        // 获取新订单数据
        $uid = session('userinfo')['uid'];
        // dd($uid);
        $address = DB::table('address')->where('uid',$uid)->get();
        $add = DB::table('address')->where('uid',$uid)->where('status','1')->first();

        $data = DB::table('orders')
        ->join('goods','oname','gname')
        ->select('orders.*','goods.company')
        ->whereIn('orders.oid',$da)
        ->where('orders.uid',$uid)
        ->where('orders.status','1')
        ->get();
        // dd($data);
        return view('home.ljq.order',['title'=>'订单提交','add'=>$address,'data'=>$data,'ids'=>$ids]);
    }

    // 选择地址
    public function seladdress(Request $request)
    {
        $aid = $request ->aid;
        $oids = $request ->oids;

        $data = explode(',',$oids);
        // var_dump($data);
        $y = 1;
        foreach ($data as $v) {
            $y *= DB::table('orders')->where('oid',$v)->update(['addid'=>$aid]);
        }
        if ($y) {
            echo 1;
        } else {
            echo 0;
        }
    }

    //修改留言
    public function message(Request $request)
    {
        $oid = $request -> oid;
        $mess = $request -> mess;
        $res = DB::table('orders')->where('oid',$oid)->update(['msg'=>$mess]);
        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
    }

    // 我的订单页
    public function myOrder(Request $request)
    {
        $like = '%%';
        $num = $request ->ordernum;
        if ($num) {
            $like = '%'.$num.'%';
        }
        $uid = session('userinfo')['uid'];
        $orders = DB::table('orders')->where('uid',$uid)->where('ordernum','like',$like)->get();
        return view('home.ljq.myorder',['title'=>'我的订单','orders'=>$orders]);
    }

    // 我的订单详情页
    public function myOrderInfo($oid)
    {
        $info = DB::table('orders')
        ->where('oid',$oid)
        ->first();
        return view('home.ljq.myOrderInfo',['title'=>'订单详情','info'=>$info]);
    }

    // 立即支付
    public function joinorder(Request $request)
    {
        $uid = session('userinfo')['uid'];
        $res = $request -> except('price');
        $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = '';
        for ($j=0; $j < 4; $j++) {
            $r .= $str[ mt_rand(0,(strlen($str)-1))];
        }
        $ornum = $r.time();
        $res['ordernum'] = $ornum;
        $res['inputtime'] = date('Y-m-d H:i:s',time());
        $a = $request->price;
        $res['total'] = $res['num']*($request->price);
        $res['uid'] = $uid;

        $result = Order::insertGetId($res);
        if($result){
            return $result;
        } else {
            return 0;
        }
    }

    // 移出订单
    public function delorder($oid)
    {
        $res = DB::table('orders')->where('oid',$oid)->update(['status'=>'0']);
        if ($res) {
            return back()->with('error','订单取消成功');
        } else {
            return back()->with('error','订单取消失败');
        }
    }

    // 设置支付密码
    public function pass(Request $request)
    {
        $uid = session('userinfo')['uid'];
        $res = $request -> except('_token');
        if ($res['v'] != $res['rv']) {
            return back()->with('error','俩次密码不一样');
        }
        $str = '';
        foreach ($res['v'] as $v) {
            $str .= $v;
        }
        $paypwd = md5($str);
        $result = DB::table('users')->where('uid',$uid)->update(['paypwd'=>$str]);
        if ($result) {
            return back()->with('error','支付密码设置成功');
        } else {
            return back()->with('error','支付密码未设置成功');
        }
    }

    // 订单支付
    public function pay(Request $request,$oids)
    {

        $uid = session('userinfo')['uid'];
        // 商品库存 -num;
        $oid = explode(',',$oids);
        // 订单状态变为 2
        $rs1 = 1;
        $rs2 = 1;
        foreach ($oid as $v) {
            $order = Order::find($v);
            $num = $order->num;
            $rs1 *= DB::table('goods')->where('gname',$order->oname)->decrement('stock',$num);
            $rs2 *= DB::table('orders')->where('oid',$v)->update(['status'=>'2']);
        }
        if ($rs1*$rs2 == 0) {
            return back()->with('error','支付出现意料之外的错误,请重新尝试');
        } else {
            return redirect('/home/paysuccess/'.$oids);
        }
    }

    // 支付成功
    public function paysuccess($oids)
    {
        $oids = explode(',',$oids);
        $res = Order::whereIn('oid',$oids)->get();
        if ($res) {
            return view('home.ljq.paysuccess',['title'=>'支付成功','res'=>$res]);
        }
    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\User;
use App\Model\Admin\Goods;
use App\Model\Home\Collect;


class OrderController extends Controller
{
    public function order(Request $request)
    {
        $uid = session('userinfo')['uid'];
        $cids = $request -> cid;
        $qtys = $request -> qty;
        // dd($cids,$qtys);
        $data = [];
        // 组合成订单数据
        for ($i=0; $i < count($cids); $i++) {
            $data[$i]['uid'] = $uid;
            $cid = $cids[$i];
            $num = $qtys[$i];
            $data[$i]['num'] = $qtys[$i];
            // 获取订单信息
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $res = '';
            for ($j=0; $j < 4; $j++) {
                $res .= $str[ mt_rand(0,(strlen($str)-1))];
            }
            $ornum = $res.time();

            $data[$i]['ordernum'] = $ornum;
            $shop = DB::table('cart') -> where('cid',$cid) -> first();
            // dd($shop);
            $data[$i]['oname'] = $shop -> gname;
            $data[$i]['total'] = ($shop -> price)*$num;
            $data[$i]['color'] = $shop -> color;
            $data[$i]['size'] = $shop -> size;
            $data[$i]['opic'] = $shop -> gimg;
            $add = DB::table('address') -> where('uid','3') ->where('status','1') -> first();
            // dd($add);
            $data[$i]['addid'] = $add['aid'];
            $data[$i]['inputtime'] = date('Y-m-d H:i:s',time());
        }
        // dd($data);
        // 插入数据
        $res = DB::table('orders') -> insert($data);
        if ($res) {
            return ('<script>location.href="/home/addorder"</script>');
        }
    }

    public function addOrder(Request $request)
    {
        // 获取新订单数据
        $uid = session('userinfo')['uid'];
        // dd($uid);
        $address = DB::table('address')->where('uid',$uid)->get();
        // dd($address);
        $data = DB::table('orders')
        ->join('goods','oname','gname')
        ->select('orders.*','goods.company')
        ->where('orders.uid',$uid)
        ->where('orders.status','1')
        ->get();
        return view('home.ljq.order',['title'=>'订单提交','add'=>$address,'data'=>$data]);
    }

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
    public function myOrderInfo($oid)
    {
        $info = DB::table('orders')
        ->join('address','aid','addid')
        ->join('goods','gname','oname')
        ->select('orders.*','address.aphone','address.aname','address.address','address.postcode','goods.company','goods.gid','goods.price')
        ->where('orders.oid',$oid)
        ->first();
        // dd($info);
        return view('home.ljq.myOrderInfo',['title'=>'订单详情','info'=>$info]);
    }

}

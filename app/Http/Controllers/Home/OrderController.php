<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\User;
use App\Model\Admin\Goods;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $cids = $request -> cid;
        $qtys = $request -> qty;
        // dd($cids,$qtys);
        $data = [];
        // 组合成订单数据
        for ($i=0; $i < count($cids); $i++) {
            $data[$i]['uid'] = 3;
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

            $data[$i]['address'] = $add -> address;
            $data[$i]['phone'] = $add -> aphone;
            $data[$i]['inputtime'] = date('Y-m-d H:i:s',time());
        }
        // 插入数据
        $res = DB::table('orders') -> insert($data);
        if ($res) {
            return ('<script>location.href="/home/addorder"</script>');
        }
    }

    public function addOrder(Request $request)
    {
        // 获取新订单数据
        $address = DB::table('address')->where('uid','3')->get();
        $data = DB::table('orders')
        ->join('goods','oname','gname')
        ->select('orders.*','goods.company')
        ->where('orders.uid','3')
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

    public function follow(Request $request)
    {
        User::follow(1);
    }
}

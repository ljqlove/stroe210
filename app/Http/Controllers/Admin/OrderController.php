<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * author:李佳奇
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('orders')
        ->join('message','orders.uid','=','message.uid')
        ->join('goods','goods.gname','=','orders.oname')
        ->select('orders.*','message.uname','goods.price')
        ->paginate(7);
        // dd($list);die;
        return view('admin.order.order',['lists'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     * 修改收货用户
     * @return \Illuminate\Http\Response
     */
    public function unameAjax(Request $request)
    {
        $id = $request -> ids;
        $res = [];
        $res['uname'] = $request -> uv;

        // var_dump($res);die;

        // 修改参数
        $data = DB::table('message')
        ->where('uid',$id)
        ->update($res);

        if ($data) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     * ajax修改商品名
     * @return \Illuminate\Http\Response
     */
    public function onameAjax(Request $request)
    {
        $id = $request -> ids;
        $res = [];
        $res['oname'] = $request -> uv;

        // var_dump($res);die;

        // 修改参数
        $data = DB::table('orders')
        ->where('oid',$id)
        ->update($res);

        if ($data) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     *  ajax修改收货地址
     * @return \Illuminate\Http\Response
     */
    public function addressAjax(Request $request)
    {
        $id = $request -> ids;
        $res = [];
        $res['address'] = $request -> uv;

        // var_dump($res);die;

        // 修改参数
        $data = DB::table('orders')
        ->where('oid',$id)
        ->update($res);

        if ($data) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     *  ajax修改收货电话
     * @return \Illuminate\Http\Response
     */
    public function phAjax(Request $request)
    {
        $id = $request -> ids;
        $res = [];
        $res['phone'] = $request -> uv;

        // var_dump($res);die;

        // 修改参数
        $data = DB::table('orders')
        ->where('oid',$id)
        ->update($res);

        if ($data) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     *  ajax修改数量
     * @return \Illuminate\Http\Response
     */
    public function numAjax(Request $request)
    {
        $id = $request -> ids;
        $res = [];
        $res['num'] = $request -> uv;

        // 获取商品名
        $oname = DB::table('orders')->where('oid',$id)->value('oname');
        // echo $res['num'];

        // 获取商品单价
        $price = DB::table('goods')->where('gname',$oname)->value('price');
        $res['total'] = $res['num'] * $price;
        // echo $res['total'];

        // 修改参数
        $data = DB::table('orders')
        ->where('oid',$id)
        ->update($res);

        if ($data) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oid = $request->input('oid');
        $status = $request -> input('status');
        // dd($status,$oid);

        //数据表修改数据
        try{

            $data = DB::table('orders')
            ->where('oid',$oid)
            ->update(['status'=>$status]);

            if($data){
                return redirect('/admin/order')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delAjax(Request $request)
    {
        $oid = $request->oid;
        $res = DB::table('orders')->where('oid',$oid)->delete();

        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    public function order()
    {
        $address = DB::table('address')->where('uid','3')->get();
        // dd($address);
        return view('home.ljq.order',['title'=>'订单提交','add'=>$address]);
    }

}

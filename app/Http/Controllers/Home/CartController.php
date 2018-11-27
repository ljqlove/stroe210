<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    public function myCart()
    {
        $cart = DB::table('cart')->get();
        return view('home.ljq.myCart',['title'=>'我的购物车','cart'=>$cart]);
    }
}

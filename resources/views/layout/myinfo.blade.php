@extends('layout.homes')

@section('sousuo')
    <div class="pc-order-titlei fl"><h2>我的购物车</h2></div>
    <div class="pc-step-title fl">
        <ul>
            <li class=" @yield('cur1')"><a href="/home/myCart">1 . 我的购物车</a></li>
            <li class=" @yield('cur2')"><a href="javascript:void(0)">2 . 填写核对订单</a></li>
            <li class=" @yield('cur3')"><a href="javascript:void(0)">3 . 成功提交订单</a></li>
        </ul>
    </div>
@endsection

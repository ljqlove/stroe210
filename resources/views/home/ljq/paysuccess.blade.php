@extends('layout.myinfo')

@section('title',$title)
@section('cur1','cur2')
@section('cur2','cur2')
@section('cur3','cur')

@section('content')
    <section>
        <div class="containers">
            <div class="pc-order-title"><h3>您的订单已提交成功!</h3> <a class="pull-right" href="/">返回首页</a></div>
            @foreach($res as $v)
            @php
                $add = DB::table('address')->where('aid',$v->addid)->first();
                $gcolor = DB::table('gcolor')->where('id',$v->color)->first();
                $gsize = DB::table('gsize')->where('id',$v->size)->first();
            @endphp
            <div style="clear:both"></div>
            <div class="pc-border clear-fix">
                <div class="pc-order-text">
                    <p>订单付款成功   订单号 ：<em>{{$v->ordernum}}</em></p>
                    <p class="reds">您已经付款成功,请耐心等待收货,记得给好评哦!!!</p>
                </div>
                <div class="pc-line"></div>
                <div class="pc-order-text">
                    <p>商品名称：{{$v->oname}} {{$gcolor->color}}  {{$gsize->size}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; x {{$v->num}}</p>
                    <p>收货地址：{{$add->address}} 收货人: {{$add->aname}} {{$add->aphone}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
@extends('layout.homes')

@section('sousuo')

    <!-- 搜索框 start -->
    <div class="head-form fl">
        <form class="clearfix" href="/home/cate">
            <input @yield('style') type="text" class="search-text" accesskey="" id="key" autocomplete="off" name="gname" placeholder="请输入要搜索的商品">
            <button class="button">搜索</button>
        </form>
        <div class="words-text clearfix">
            <a href="#" class="red">1元秒爆</a>
            <a href="#">低至五折</a>
            <a href="#">农用物资</a>
            <a href="#">买一赠一</a>
            <a href="#">佳能相机</a>
            <a href="#">稻香村月饼</a>
            <a href="#">服装城</a>
        </div>
    </div>
    <!-- 搜索框 end -->
    <!-- 购物车 strat -->
    <div class="header-cart fr"><a href="/home/myCart"><img src="/homes/theme/icon/car.png"></a>
        @if($userinfo = session('userinfo'))
        <i class="head-amount set">{{\DB::table('cart')->where('uid',$userinfo['uid'])->count()}}</i>
        @else if($userinfo == 0)
        <i class="head-amount">0</i>
        @endif
        <script>
            $(function(){
                setInterval(function(){
                    $('i[class=set]').toggle();
                },1000)
            })
        </script>
    </div>
    <div class="head-mountain"></div>
    <!-- 购物车 end -->
@endsection

@section('content')
    @php
        $res = \DB::table('message')->where('uid',$userinfo['uid'])->first();
    @endphp
    <div class="containers"><div class="pc-nav-item"><a href="/">首页</a> &gt; <a href="/home/wjd/message">会员中心 </a> @yield('bnv')</div></div>

    <!-- 商城快讯 begin -->
    <section id="member">
        <div class="member-center clearfix">
        <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl"><a href="#"><img height="80" width="80" src="{{$res->headpic}}"></a></div>
                <div class="fl">
                    <p>用户昵称：</p>
                    <p><a href="">{{$res->mname}}</a></p>
                    <p>搜悦号：</p>
                    <p>{!!$res->mid!!}</p>
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd class="cur"><a href="/home/myOrder">我的订单</a></dd>
                    <dd><a href="/home/myCollect">我的收藏</a></dd>
                    <dd><a href="#">账户安全</a></dd>
                    <dd><a href="#">我的评价</a></dd>
                    <dd><a href="#">地址管理</a></dd>
                </dl>
                <dl>
                    <dt>客户服务</dt>
                    <dd><a href="#">退货申请</a></dd>
                    <dd><a href="#">退货/退款记录</a></dd>
                </dl>
                <dl>
                    <dt>我的消息</dt>
                    <dd><a href="#">商城快讯</a></dd>
                    <dd><a href="#">帮助中心</a></dd>
                </dl>
            </div>
        </div>
    @yield('con')
@endsection
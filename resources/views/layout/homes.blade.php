<!doctype html>
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta name="renderer" content="webkit">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="/homes/theme/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/home.css">

    <script type="text/javascript" src="/homes/theme/js/jquery.js"></script>

    <link rel="stylesheet" href="/font/css/font-awesome.min.css">
    <style>
        /*灰色遮罩层*/
        .fade{
            width:100%;
            height:100%;
            background:rgba(0, 0, 0, 0.5);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 99;
        }
        /*弹出层*/
        .succ-pop{
            width: 400px;
            height: 300px;
            background: #fff;
            position: fixed;
            left: 50%;
            top: 50%;
            margin-left: -200px;
            margin-top: -150px;
            z-index: 999;
            border-radius: 5px;
        }
        .succ-pop h3.title{
            text-align: center;
            font-size: 22px;
            color: #ce002c;
            margin-top:80px;
        }
    </style>
    @yield('js')
 </head>
 <body>

<div>
    <div id="moquu_wxin" class="moquu_wxin"><a href="javascript:void(0)"><div class="moquu_wxinh"></div></a></div>
    <div id="moquu_wshare" class="moquu_wshare"><a href="javascript:void(0)" style="text-indent:0"><div class="moquu_wshareh"><img src="/homes/theme/icon/moquu_wshare.png" width="100%"></div></a></div>
    <div id="moquu_wmaps"><a href="javascript:void(0)" class='moquu_wmaps'></a></div>
    <a id="moquu_top" href="javascript:void(0)"></a>
</div>
@if($err=session('error'))
    <div class="fade"></div>
    <div class="succ-pop">
        <div >
            <ul>
               <li style="font-weight: bold;font-size: 20px;text-align: center;padding:10px 80px;margin-top:80px">{{$err}}</li>
            </ul>
        </div>
        <a id="button" style="border:1px solid red;display: block;width:200px;margin-top:120px;height:40px;border-radius:10px;margin-left:100px;text-align:center;line-height: 40px;font-size:18px;font-weight: bold;color:#fff;background:#e53e41" href="javascript:void(0)">关闭</a>
    </div>
@endif
<!--- header begin-->
<header id="pc-header">
    <div class="BHeader">
        <div class="yNavIndex">
            <ul class="BHeaderl">

                @if($userinfo = session('userinfo'))
                <li><a href="/" style="color:#ea4949;">Hello,
                    @if(($res = \DB::table('message')->where('uid',$userinfo['uid'])->first())->mname != 'default')
                    {{$res->mname}}
                    @else
                    {{$userinfo['phone']}}
                    @endif
                </a> </li>


                <a href="/home/logout" style="float:left;">退出</a>
                @else if
                <li><a href="/home/login" style="color:#ea4949;">请登录</a> </li>
                @endif

                <li class="headerul">|</li>
                <li><a href="/home/register">免费注册</a> </li>
                <li class="headerul">|</li>
                <li><a href="/home/myOrder">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="/home/myCollect">我的收藏</a> </li>
                <li class="headerul">|</li>
                @php
                $res = \DB::table('stores')->where('uid',session('userinfo')['uid'])->get();

                if(count($res)){
                    echo '<li><a href="/home/myStroe">我的店铺</a> </li>';
                } else {
                    echo '<li><a href="/home/Merchant">我要开店</a> </li>';
                }
                @endphp
                <li class="headerul">|</li>
                <li id="pc-nav" class="menu"><a href="/home/wjd/message" >我的商城</a>
                </li>
                <li class="headerul">|</li>
            </ul>
        </div>
    </div>
    <div class="container clearfix">
        @php
            $site = DB::table('site')->where('id',1)->first();
        @endphp
        <!-- logo start -->
        <div class="header-logo fl"><h1><a href="/"><img src="{{$site->LOGO}}"></a> </h1></div>
        <!-- logo end -->
        @yield('sousuo')
    </div>
    <div class="yHeader">
        <div class="yNavIndex">
            @yield('zuo')
            @yield('nav')
            <!-- nav start -->


            <!-- nav end -->
        </div>
    </div>
</header>
<!-- header End -->

@yield('content')

<!-- footer start -->
<div class="aui-footer-bot">
    <div class="time-lists aui-footer-pd clearfix">
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/homes/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/homes/theme/icon/icon-d2.png"></span>
                <em>新手上路</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/homes/theme/icon/icon-d3.png"></span>
                <em>保障正品</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/homes/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>

    </div>
    <div style="border-bottom:1px solid #dedede"></div>
    <div class="time-lists aui-footer-pd time-lists-ls clearfix">
        <div class="aui-footer-list clearfix">
            <h4>购物指南</h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">购物流程</a> </li>
                <li><a href="#">会员介绍 </a> </li>
                <li><a href="#">生活旅行</a> </li>
                <li><a href="#"> 常见问题 </a> </li>
                <li><a href="#"> 联系客服购物指南 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>特色服务</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>帮助中心</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>新手指导</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
</div>
<!-- 轮播js start -->
@yield('banner')
<script>
    $('#button').click(function(){
        $('.succ-pop').css('display','none');
        $('.fade').css('display','none');
    })
</script>
<!-- 轮播js stop -->
</body>
</html>
<!-- footer end -->
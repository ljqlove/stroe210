@extends('layout.homes')

@section('js')
    <meta content="歪秀购物, 购物, 大家电, 手机" name="keywords">
    <meta content="歪秀购物，购物商城。" name="description">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/member.css">
    <script>
        $(function(){

            $("#H-table li").each(function(i){
                $(this).click((function(k){
                    var _index = k;
                    return function(){
                        $(this).addClass("cur").siblings().removeClass("cur");
                        $(".H-over").hide();
                        $(".H-over:eq(" + _index + ")").show();
                    }
                })(i));
            });
            $("#H-table1 li").each(function(i){
                $(this).click((function(k){
                    var _index = k;
                    return function(){
                        $(this).addClass("cur").siblings().removeClass("cur");
                        $(".H-over1").hide();
                        $(".H-over1:eq(" + _index + ")").show();
                    }
                })(i));
            });
        });
    </script>
@endsection

@section('title',$title)

@section('sousuo')
    <!-- 搜索框 start -->
    <div class="head-form fl">
        <form class="clearfix">
            <input type="text" class="search-text" accesskey="" id="key" autocomplete="off"  placeholder="洗衣机">
            <button class="button" onClick="search('key');return false;">搜索</button>
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
        <i class="head-amount">{{\DB::table('cart')->where('uid',3)->count()}}</i>
        <script>
            setInterval(function(){
                $('i[class=head-amount]').toggle();
            },1000)
        </script>
    </div>
    <div class="head-mountain"></div>
    <!-- 购物车 end -->
@endsection

@section('content')
<!-- 商城快讯 begin -->
<section id="member">
    <div class="member-center clearfix">
        <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl"><a href="#"><img src="/homes/theme/img/bg/mem.png"></a></div>
                <div class="fl">
                    <p>用户名：</p>
                    <p><a href="#">亚里士多德</a></p>
                    <p>搜悦号：</p>
                    <p>389323080</p>
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd class="cur"><a href="#">我的订单</a></dd>
                    <dd><a href="#">我的收藏</a></dd>
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
        <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>订单号：{{$info->ordernum}}</h2></div>
                <div class="member-backs fr"><a href="/home/myOrder">返回订单首页</a></div>
            </div>
            @php
                if ($info->status == 0){
                    $status = "无效订单";
                } elseif ($info->status == 1){
                    $status = "等待买家付款";
                } elseif ($info->status == 2){
                    $status = "等待卖家发货";
                } elseif ($info->status == 3){
                    $status = "卖家已发货";
                } else {
                    $status = "买家已收货";
                }
            @endphp
            <div class="member-border">
               <div class="member-order">
                   <dl>
                       <dt>订单状态</dt>
                       <dd class="member-seller">{{$status}}  </dd>
                   </dl>
                   <dl class="member-custom clearfix ">
                       <dt>订单信息</dt>
                       <dd>订单编号：{{$info->ordernum}}</dd>
                       <dd>订单金额：￥{{$info->total}}</dd>
                       <dd>付款时间：{{$info->inputtime}}</dd>
                   </dl>
                   <dl>
                       <dt>配送信息</dt>
                       <dd class="member-seller"><span>收货人：<em>{{$info->aname}}</em></dd>
                       <dd class="member-seller"><span>收货人电话：<em>{{$info->aphone}}</em></dd>
                       <dd class="member-seller"><span>收货地址：<em>{{$info->address}}</em></dd>
                       <dd class="member-seller"><span>收货人邮编：<em>{{$info->postcode}}</em></dd>
                   </dl>
                   <dl class="member-custom clearfix ">
                       <dt>客户留言</dt>
                       <dd><span>{{$info->msg}}</span></dd>

                   </dl>
                   <dl>
                       <dt>商品信息</dt>
                       <dd class="member-seller">本订单是由 “{{$info->company}}” 发货并且提高售后服务，商品在下单后会尽快给您发货。 </dd>
                   </dl>
               </div>
               <div class="member-serial">
                   <ul>
                       <li class="clearfix">
                           <div class="No1">商品编号</div>
                           <div class="No2">商品名称</div>
                           <div class="No3">数量</div>
                           <div class="No4">单价</div>
                           <div class="No5">小计</div>
                       </li>
                       <li class="clearfix">
                           <div class="No1">{{$info->gid}}</div>
                           <div class="No2"><a href="#">{{$info->oname}}</a> </div>
                           <div class="No3">{{$info->num}}</div>
                           <div class="No4">￥{{$info->price}}</div>
                           <div class="No5">￥{{$info->total}}</div>
                       </li>
                   </ul>
               </div>
            </div>
            <!-- <div class="member-settle clearfix">
                <div class="fr">
                    <div><span>商品金额：</span><em>￥270.00</em></div>
                    <div><span>运费：</span><em>￥270.00</em></div>
                    <div class="member-line"></div>
                    <div><span>共需支付：</span><em>￥280.00</em></div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- 商城快讯 End -->
@endsection
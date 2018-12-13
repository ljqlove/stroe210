@extends('layout.mymsg')

@section('bnv')
    &gt; <a href='/home/myOrder'>我的订单</a> &gt; <a href='javascript:void(0)'>订单详情</a>
@endsection

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


@section('con')

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

                $good = DB::table('goods')->where('gname',$info->oname)->first();
                $user = DB::table('users')->where('uid',$info->uid)->first();
                $add = DB::table('address')->where('aid',$info->addid)->first();
                $com = DB::table('stores')->where('id',$good->company)->first();
                $gcolor = DB::table('gcolor')->where('id',$info->color)->first();
                $gsize = DB::table('gsize')->where('id',$info->size)->first();
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
                       <dd class="member-seller"><span>收货人：<em>{{$add['aname']}}</em></dd>
                       <dd class="member-seller"><span>收货人电话：<em>{{$add['aphone']}}</em></dd>
                       <dd class="member-seller"><span>收货地址：<em>{{$add['address']}}</em></dd>
                       <dd class="member-seller"><span>收货人邮编：<em>{{$add['postcode']}}</em></dd>
                   </dl>
                   <dl class="member-custom clearfix ">
                       <dt>客户留言</dt>
                       <dd><span>{{$info->msg}}</span></dd>

                   </dl>
                   <dl>
                       <dt>商品信息</dt>
                       <dd class="member-seller">本订单是由 “{{$com->company}}” 发货并且提高售后服务，商品在下单后会尽快给您发货。 </dd>
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
                           <div class="No1">{{$good->gid}}</div>
                           <div class="No2"><a href="#">{{$good->gname}}</a> </div>
                           <div class="No3">{{$info->num}}</div>
                           <div class="No4">￥{{$gsize->price}}</div>
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
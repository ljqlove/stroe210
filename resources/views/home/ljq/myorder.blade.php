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
    <div class="containers"><div class="pc-nav-item"><a href="#">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">商城快讯</a></div></div>

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
                    <form action="/home/myOrder" method="post" name="form1">
                      <div class="member-heels fl"><h2>我的订单</h2></div>
                      <div class="member-backs member-icons fr"><a type="submit" href="javascript:document.form1.submit();">搜索</a></button></div>
                      {{csrf_field()}}
                      <div class="member-about fr"><input type="text" placeholder="订单编号" name="ordernum"></div>
                    </form>
                </div>
                <div class="member-whole clearfix">
                    <ul id="H-table" class="H-table">
                        <li class="cur"><a href="javascript:void(0)">我的订单(<em id="e1">44</em>)</a></li>
                        <li><a href="javascript:void(0)">待付款(<em id="e2">44</em>)</a></li>
                        <li><a href="javascript:void(0)">待发货(<em id="e3">44</em>)</a></li>
                        <li><a href="javascript:void(0)">待收货(<em id="e4">44</em>)</a></li>
                        <li><a href="javascript:void(0)">交易完成(<em id="e5">44</em>)</a></li>
                        <li><a href="javascript:void(0)">无效订单(<em id="e6">44</em>)</a></li>
                    </ul>
                </div>
                <div class="member-border">
                   <div class="member-return H-over">
                       <div class="member-cancel clearfix">
                           <span class="be1">订单信息</span>
                           <span class="be2">收货人</span>
                           <span class="be2">订单金额</span>
                           <span class="be2">订单时间</span>
                           <span class="be2">订单状态</span>
                           <span class="be2">订单操作</span>
                       </div>
                       <div class="member-sheet clearfix">
                           <ul id="o1">
                                @foreach($orders as $v)
                                     {{-- 获取店铺信息 --}}
                                @php
                                    $res = \DB::table('goods')->where('gname',$v->oname)->first();
                                    $add = \DB::table('address')->where('aid',$v->addid)->first();
                                @endphp
                               <li>
                                   <div class="member-minute clearfix">
                                       <span>{{$v->inputtime}}</span>
                                       <span>订单号：<em>{{$v->ordernum}}</em></span>
                                       <span><a href="#">{{$res->company}}</a></span>
                                       <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                   </div>
                                   <div class="member-circle clearfix" style="height:125px">
                                       <div class="ci1">
                                           <div class="ci7 clearfix">

                                               <span class="gr1" style="height:100px"><a href="#"><img src="{{$v->opic}}" width="60" height="60" title="" about=""></a></span>
                                               <span class="gr2"><a href="/home/goods/{{$res->gid}}">{{$v->oname}} {{$v->color}} {{$v->size}}</a></span>
                                               <span class="gr3">X{{$v->num}}</span>
                                           </div>
                                       </div>
                                       <div class="ci2" style="height:100px">{{$add->aname}}</div>
                                       <div class="ci3" style="height:100px"><b>￥{{$v->total}}</b></div>
                                       <div class="ci4" style="height:100px"><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                       @php
                                        if ($v->status == 0){
                                            $status = "无效订单";
                                            $con = "<p> 订单已失效 </p> <p> <a href='/home/myOrderInfo/$v->oid'>查看订单</a> </p>";
                                        } elseif ($v->status == 1){
                                            $status = "等待付款";
                                            $con = "<p> <a href='javascript:void(0)' class='member-touch'>立即支付</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                        } elseif ($v->status == 2){
                                            $status = "等待卖家发货";
                                            $con = "<p> <a href='javascript:void(0)' class='member-touch'>提醒发货</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                        } elseif ($v->status == 3){
                                            $status = "已发货";
                                            $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> <a href='javascript:void(0)' class='member-touch'>确认收货</a> </p>";
                                        } else {
                                            $status = "已完成";
                                            $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> 交易完成 </p>";
                                        }
                                        @endphp
                                        <div class="ci5" style="height:100px">
                                            <p>{{$status}}</p>
                                            <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                        </div>
                                        <div class="ci5 ci8" style="height:100px">
                                            {!! $con !!}
                                        </div>
                                   </div>
                               </li>
                               @endforeach
                           </ul>
                       </div>
                   </div>
                   <div class="member-return H-over" style="display:none;">
                       <div class="member-cancel clearfix">
                           <span class="be1">订单信息</span>
                           <span class="be2">收货人</span>
                           <span class="be2">订单金额</span>
                           <span class="be2">订单时间</span>
                           <span class="be2">订单状态</span>
                           <span class="be2">订单操作</span>
                       </div>
                       <div class="member-sheet clearfix">
                           <ul id="o2">
                                @foreach ($orders as $v)
                                @php
                                    $res = \DB::table('goods')->where('gname',$v->oname)->first();
                                @endphp
                                @if ($v->status == 1)
                                <li>
                                   <div class="member-minute clearfix">
                                       <span>{{$v->inputtime}}</span>
                                       <span>订单号：<em>{{$v->ordernum}}</em></span>
                                       <span><a href="#">{{$res->company}}</a></span>
                                       <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                   </div>
                                   <div class="member-circle clearfix" style="height:125px">
                                       <div class="ci1">
                                           <div class="ci7 clearfix">

                                               <span class="gr1" style="height:100px"><a href="#"><img src="{{$v->opic}}" width="60" height="60" title="" about=""></a></span>
                                               <span class="gr2"><a href="/home/goods/{{$res->gid}}">{{$v->oname}} {{$v->color}} {{$v->size}}</a></span>
                                               <span class="gr3">X{{$v->num}}</span>
                                           </div>
                                       </div>
                                       <div class="ci2" style="height:100px">{{$add->aname}}</div>
                                       <div class="ci3" style="height:100px"><b>￥{{$v->total}}</b></div>
                                       <div class="ci4" style="height:100px"><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                        <div class="ci5" style="height:100px">
                                            <p><a href="#">等待付款</a></p>
                                            <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                        </div>
                                        <div class="ci5 ci8" style="height:100px">
                                            <p> <a href='javascript:void(0)' class='member-touch'>立即支付</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>
                                        </div>
                                   </div>
                               </li>
                               @endif
                               @endforeach
                           </ul>
                       </div>
                   </div>
                    <div class="member-return H-over" style="display:none;">
                        <div class="member-cancel clearfix">
                           <span class="be1">订单信息</span>
                           <span class="be2">收货人</span>
                           <span class="be2">订单金额</span>
                           <span class="be2">订单时间</span>
                           <span class="be2">订单状态</span>
                           <span class="be2">订单操作</span>
                       </div>
                       <div class="member-sheet clearfix">
                           <ul id="o3">
                                @foreach ($orders as $v)
                                @php
                                    $res = \DB::table('goods')->where('gname',$v->oname)->first();
                                @endphp
                                @if ($v->status == 2)
                                <li>
                                   <div class="member-minute clearfix">
                                       <span>{{$v->inputtime}}</span>
                                       <span>订单号：<em>{{$v->ordernum}}</em></span>
                                       <span><a href="#">{{$res->company}}</a></span>
                                       <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                   </div>
                                   <div class="member-circle clearfix" style="height:125px">
                                       <div class="ci1">
                                           <div class="ci7 clearfix">

                                               <span class="gr1" style="height:100px"><a href="#"><img src="{{$v->opic}}" width="60" height="60" title="" about=""></a></span>
                                               <span class="gr2"><a href="/home/goods/{{$res->gid}}">{{$v->oname}} {{$v->color}} {{$v->size}}</a></span>
                                               <span class="gr3">X{{$v->num}}</span>
                                           </div>
                                       </div>
                                       <div class="ci2" style="height:100px">{{$add->aname}}</div>
                                       <div class="ci3" style="height:100px"><b>￥{{$v->total}}</b></div>
                                       <div class="ci4" style="height:100px"><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                        <div class="ci5" style="height:100px">
                                            <p><a href="#">等待卖家发货</a></p>
                                            <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                        </div>
                                        <div class="ci5 ci8" style="height:100px">
                                            <p> <a href='javascript:void(0)' class='member-touch'>提醒发货</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>
                                        </div>
                                   </div>
                               </li>
                               @endif
                               @endforeach
                           </ul>
                       </div>
                    </div>
                   <div class="member-return H-over" style="display:none;">
                        <div class="member-cancel clearfix">
                           <span class="be1">订单信息</span>
                           <span class="be2">收货人</span>
                           <span class="be2">订单金额</span>
                           <span class="be2">订单时间</span>
                           <span class="be2">订单状态</span>
                           <span class="be2">订单操作</span>
                       </div>
                       <div class="member-sheet clearfix">
                           <ul id="o4">
                                @foreach ($orders as $v)
                                @php
                                    $res = \DB::table('goods')->where('gname',$v->oname)->first();
                                @endphp
                                @if ($v->status == 3)
                                <li>
                                   <div class="member-minute clearfix">
                                       <span>{{$v->inputtime}}</span>
                                       <span>订单号：<em>{{$v->ordernum}}</em></span>
                                       <span><a href="#">{{$res->company}}</a></span>
                                       <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                   </div>
                                   <div class="member-circle clearfix" style="height:125px">
                                       <div class="ci1">
                                           <div class="ci7 clearfix">

                                               <span class="gr1" style="height:100px"><a href="#"><img src="{{$v->opic}}" width="60" height="60" title="" about=""></a></span>
                                               <span class="gr2"><a href="/home/goods/{{$res->gid}}">{{$v->oname}} {{$v->color}} {{$v->size}}</a></span>
                                               <span class="gr3">X{{$v->num}}</span>
                                           </div>
                                       </div>
                                       <div class="ci2" style="height:100px">{{$add->aname}}</div>
                                       <div class="ci3" style="height:100px"><b>￥{{$v->total}}</b></div>
                                       <div class="ci4" style="height:100px"><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                        <div class="ci5" style="height:100px">
                                            <p><a href="#">已发货</a></p>
                                            <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                        </div>
                                        <div class="ci5 ci8" style="height:100px">
                                            <p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> <a href='javascript:void(0)' class='member-touch'>确认收货</a> </p>
                                        </div>
                                   </div>
                               </li>
                               @endif
                               @endforeach
                           </ul>
                       </div>
                   </div>
                   <div class="member-return H-over" style="display:none;">
                        <div class="member-cancel clearfix">
                           <span class="be1">订单信息</span>
                           <span class="be2">收货人</span>
                           <span class="be2">订单金额</span>
                           <span class="be2">订单时间</span>
                           <span class="be2">订单状态</span>
                           <span class="be2">订单操作</span>
                       </div>
                       <div class="member-sheet clearfix">
                           <ul id="o5">
                                @foreach ($orders as $v)
                                @php
                                    $res = \DB::table('goods')->where('gname',$v->oname)->first();
                                @endphp
                                @if ($v->status == 4)
                                <li>
                                   <div class="member-minute clearfix">
                                       <span>{{$v->inputtime}}</span>
                                       <span>订单号：<em>{{$v->ordernum}}</em></span>
                                       <span><a href="#">{{$res->company}}</a></span>
                                       <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                   </div>
                                   <div class="member-circle clearfix" style="height:125px">
                                       <div class="ci1">
                                           <div class="ci7 clearfix">

                                               <span class="gr1" style="height:100px"><a href="#"><img src="{{$v->opic}}" width="60" height="60" title="" about=""></a></span>
                                               <span class="gr2"><a href="/home/goods/{{$res->gid}}">{{$v->oname}} {{$v->color}} {{$v->size}}</a></span>
                                               <span class="gr3">X{{$v->num}}</span>
                                           </div>
                                       </div>
                                       <div class="ci2" style="height:100px">{{$add->aname}}</div>
                                       <div class="ci3" style="height:100px"><b>￥{{$v->total}}</b></div>
                                       <div class="ci4" style="height:100px"><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                        <div class="ci5" style="height:100px">
                                            <p><a href="#">已完成</a></p>
                                            <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                        </div>
                                        <div class="ci5 ci8" style="height:100px">
                                            <p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> 交易完成 </p>
                                        </div>
                                   </div>
                               </li>
                               @endif
                               @endforeach
                           </ul>
                       </div>
                   </div>
                   <div class="member-return H-over" style="display:none;">
                        <div class="member-cancel clearfix">
                           <span class="be1">订单信息</span>
                           <span class="be2">收货人</span>
                           <span class="be2">订单金额</span>
                           <span class="be2">订单时间</span>
                           <span class="be2">订单状态</span>
                           <span class="be2">订单操作</span>
                       </div>
                       <div class="member-sheet clearfix">
                           <ul id="o6">
                                @foreach ($orders as $v)
                                @php
                                    $res = \DB::table('goods')->where('gname',$v->oname)->first();
                                @endphp
                                @if ($v->status == 0)
                                <li>
                                   <div class="member-minute clearfix">
                                       <span>{{$v->inputtime}}</span>
                                       <span>订单号：<em>{{$v->ordernum}}</em></span>
                                       <span><a href="#">{{$res->company}}</a></span>
                                       <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                   </div>
                                   <div class="member-circle clearfix" style="height:125px">
                                       <div class="ci1">
                                           <div class="ci7 clearfix">

                                               <span class="gr1" style="height:100px"><a href="#"><img src="{{$v->opic}}" width="60" height="60" title="" about=""></a></span>
                                               <span class="gr2"><a href="/home/goods/{{$res->gid}}">{{$v->oname}} {{$v->color}} {{$v->size}}</a></span>
                                               <span class="gr3">X{{$v->num}}</span>
                                           </div>
                                       </div>
                                       <div class="ci2" style="height:100px">{{$add->aname}}</div>
                                       <div class="ci3" style="height:100px"><b>￥{{$v->total}}</b></div>
                                       <div class="ci4" style="height:100px"><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                        <div class="ci5" style="height:100px">
                                            <p><a href="#">无效订单</a></p>
                                            <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                        </div>
                                        <div class="ci5 ci8" style="height:100px">
                                            <p> 订单已失效 </p> <p> <a href='/home/myOrderInfo/$v->oid'>查看订单</a> </p>
                                        </div>
                                   </div>
                               </li>
                               @endif
                               @endforeach
                           </ul>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 商城快讯 End -->
    <script>
        $('#e1').text($('#o1 li').length);
        $('#e2').text($('#o2 li').length);
        $('#e3').text($('#o3 li').length);
        $('#e4').text($('#o4 li').length);
        $('#e5').text($('#o5 li').length);
        $('#e6').text($('#o6 li').length);

    </script>
@endsection
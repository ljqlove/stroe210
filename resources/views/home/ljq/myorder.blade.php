@extends('layout.mymsg')

@section('title',$title)

@section('bnv')
    &gt; <a href=''>我的订单</a>
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

@section('con')
      <div class="member-right fr">
          <div class="member-head">
              <form action="/home/myOrder" method="post" name="form1">
                <div class="member-heels fl"><h2>我的订单</h2></div>
                <div class="member-backs member-icons fr">
                  <a type="submit" href="javascript:document.form1.submit();">搜索</a></div>
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
                              $com = \DB::table('stores')->where('id',$res->company)->first();
                              $color = \DB::table('gcolor')->where('id',$v->color)->first();
                              $size = \DB::table('gsize')->where('id',$v->size)->first();
                          @endphp
                         <li>
                             <div class="member-minute clearfix">
                                 <span>{{$v->inputtime}}</span>
                                 <span>订单号：<em>{{$v->ordernum}}</em></span>
                                 <span><a href="#">{{$com->company}}</a></span>
                                 <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                             </div>
                             <div class="member-circle clearfix" >
                                 <div class="ci1">
                                     <div class="ci7 clearfix">
                                         <span class="gr1" >
                                          <a href="/home/goods/{{$res->gid}}">
                                            <img src="{{$v->opic}}" width="60" height="60" title="" about="">
                                          </a>
                                        </span>
                                         <span class="gr2">
                                          <a style="font-size:14px" href="/home/goods/{{$res->gid}}">
                                            {{$v->oname}} {{$color->color}} {{$size->size}}
                                          </a>
                                        </span>
                                         <span class="gr3">X{{$v->num}}</span>
                                     </div>
                                 </div>
                                 <div class="ci2" >
                                  @php
                                    $add = \DB::table('address')->where('aid',$v->addid)->first();
                                  @endphp
                                  @if($add)
                                  {{$add->aname}}
                                  @else
                                  尚无
                                  @endif
                                </div>
                                 <div class="ci3" ><b>￥{{$v->total}}</b></div>
                                 <div class="ci4" ><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                 @php
                                  if ($v->status == 0){
                                      $status = "无效订单";
                                      $con = "<p> 订单已失效 </p> <p> <a href='/home/myOrderInfo/$v->oid'>查看订单</a> </p>";
                                  } elseif ($v->status == 1){
                                      $status = "等待付款";
                                      $con = "<p> <a href='/home/addorder/$v->oid' class='member-touch'>立即支付</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 2){
                                      $status = "等待卖家发货";
                                      $con = "<p> <a href='javascript:void(0)' class='member-touch'>提醒发货</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 3){
                                      $status = "已发货";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> <a href='/home/goodok/$v->oid' class='member-touch'>确认收货</a> </p>";
                                  } else {
                                      $status = "已完成";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> 交易完成 </p>";
                                  }
                                  @endphp
                                  <div class="ci5" >
                                      <p>{{$status}}</p>
                                      <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                  </div>
                                  <div class="ci5 ci8" >
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
                              $com = \DB::table('stores')->where('id',$res->company)->first();
                              $color = \DB::table('gcolor')->where('id',$v->color)->first();
                              $size = \DB::table('gsize')->where('id',$v->size)->first();
                          @endphp
                          @if ($v->status == 1)
                          <li>
                             <div class="member-minute clearfix">
                                 <span>{{$v->inputtime}}</span>
                                 <span>订单号：<em>{{$v->ordernum}}</em></span>
                                 <span><a href="#">{{$com->company}}</a></span>
                                 <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                             </div>
                             <div class="member-circle clearfix" >
                                 <div class="ci1">
                                     <div class="ci7 clearfix">
                                         <span class="gr1" >
                                          <a href="/home/goods/{{$res->gid}}">
                                            <img src="{{$v->opic}}" width="60" height="60" title="" about="">
                                          </a>
                                        </span>
                                         <span class="gr2">
                                          <a style="font-size:14px" href="/home/goods/{{$res->gid}}">
                                            {{$v->oname}} {{$color->color}} {{$size->size}}
                                          </a>
                                        </span>
                                         <span class="gr3">X{{$v->num}}</span>
                                     </div>
                                 </div>
                                 <div class="ci2" >
                                  @php
                                    $add = \DB::table('address')->where('aid',$v->addid)->first();
                                  @endphp
                                  @if($add)
                                  {{$add->aname}}
                                  @else
                                  尚无
                                  @endif
                                 </div>
                                 <div class="ci3" ><b>￥{{$v->total}}</b></div>
                                 <div class="ci4" ><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                 @php
                                  if ($v->status == 0){
                                      $status = "无效订单";
                                      $con = "<p> 订单已失效 </p> <p> <a href='/home/myOrderInfo/$v->oid'>查看订单</a> </p>";
                                  } elseif ($v->status == 1){
                                      $status = "等待付款";
                                      $con = "<p> <a href='/home/addorder/$v->oid' class='member-touch'>立即支付</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 2){
                                      $status = "等待卖家发货";
                                      $con = "<p> <a href='javascript:void(0)' class='member-touch'>提醒发货</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 3){
                                      $status = "已发货";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> <a href='/home/goodok/$v->oid' class='member-touch'>确认收货</a> </p>";
                                  } else {
                                      $status = "已完成";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> 交易完成 </p>";
                                  }
                                  @endphp
                                  <div class="ci5" >
                                      <p>{{$status}}</p>
                                      <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                  </div>
                                  <div class="ci5 ci8" >
                                      {!! $con !!}
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
                              $com = \DB::table('stores')->where('id',$res->company)->first();
                              $color = \DB::table('gcolor')->where('id',$v->color)->first();
                              $size = \DB::table('gsize')->where('id',$v->size)->first();
                          @endphp
                          @if ($v->status == 2)
                          <li>
                             <div class="member-minute clearfix">
                                 <span>{{$v->inputtime}}</span>
                                 <span>订单号：<em>{{$v->ordernum}}</em></span>
                                 <span><a href="#">{{$com->company}}</a></span>
                                 <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                             </div>
                             <div class="member-circle clearfix" >
                                 <div class="ci1">
                                     <div class="ci7 clearfix">
                                         <span class="gr1" >
                                          <a href="/home/goods/{{$res->gid}}">
                                            <img src="{{$v->opic}}" width="60" height="60" title="" about="">
                                          </a>
                                        </span>
                                         <span class="gr2">
                                          <a style="font-size:14px" href="/home/goods/{{$res->gid}}">
                                            {{$v->oname}} {{$color->color}} {{$size->size}}
                                          </a>
                                        </span>
                                         <span class="gr3">X{{$v->num}}</span>
                                     </div>
                                 </div>
                                 <div class="ci2" >
                                  @php
                                    $add = \DB::table('address')->where('aid',$v->addid)->first();
                                  @endphp
                                  @if($add)
                                  {{$add->aname}}
                                  @else
                                  尚无
                                  @endif
                                 </div>
                                 <div class="ci3" ><b>￥{{$v->total}}</b></div>
                                 <div class="ci4" ><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                 @php
                                  if ($v->status == 0){
                                      $status = "无效订单";
                                      $con = "<p> 订单已失效 </p> <p> <a href='/home/myOrderInfo/$v->oid'>查看订单</a> </p>";
                                  } elseif ($v->status == 1){
                                      $status = "等待付款";
                                      $con = "<p> <a href='/home/addorder/$v->oid' class='member-touch'>立即支付</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 2){
                                      $status = "等待卖家发货";
                                      $con = "<p> <a href='javascript:void(0)' class='member-touch'>提醒发货</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 3){
                                      $status = "已发货";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> <a href='/home/goodok/$v->oid' class='member-touch'>确认收货</a> </p>";
                                  } else {
                                      $status = "已完成";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> 交易完成 </p>";
                                  }
                                  @endphp
                                  <div class="ci5" >
                                      <p>{{$status}}</p>
                                      <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                  </div>
                                  <div class="ci5 ci8" >
                                      {!! $con !!}
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
                              $com = \DB::table('stores')->where('id',$res->company)->first();
                              $color = \DB::table('gcolor')->where('id',$v->color)->first();
                              $size = \DB::table('gsize')->where('id',$v->size)->first();
                          @endphp
                          @if ($v->status == 3)
                          <li>
                             <div class="member-minute clearfix">
                                 <span>{{$v->inputtime}}</span>
                                 <span>订单号：<em>{{$v->ordernum}}</em></span>
                                 <span><a href="#">{{$com->company}}</a></span>
                                 <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                             </div>
                             <div class="member-circle clearfix" >
                                 <div class="ci1">
                                     <div class="ci7 clearfix">
                                         <span class="gr1" >
                                          <a href="/home/goods/{{$res->gid}}">
                                            <img src="{{$v->opic}}" width="60" height="60" title="" about="">
                                          </a>
                                        </span>
                                         <span class="gr2">
                                          <a style="font-size:14px" href="/home/goods/{{$res->gid}}">
                                            {{$v->oname}} {{$color->color}} {{$size->size}}
                                          </a>
                                        </span>
                                         <span class="gr3">X{{$v->num}}</span>
                                     </div>
                                 </div>
                                 <div class="ci2" >
                                  @php
                                    $add = \DB::table('address')->where('aid',$v->addid)->first();
                                  @endphp
                                  @if($add)
                                  {{$add->aname}}
                                  @else
                                  尚无
                                  @endif
                                 </div>
                                 <div class="ci3" ><b>￥{{$v->total}}</b></div>
                                 <div class="ci4" ><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                 @php
                                  if ($v->status == 0){
                                      $status = "无效订单";
                                      $con = "<p> 订单已失效 </p> <p> <a href='/home/myOrderInfo/$v->oid'>查看订单</a> </p>";
                                  } elseif ($v->status == 1){
                                      $status = "等待付款";
                                      $con = "<p> <a href='/home/addorder/$v->oid' class='member-touch'>立即支付</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 2){
                                      $status = "等待卖家发货";
                                      $con = "<p> <a href='javascript:void(0)' class='member-touch'>提醒发货</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 3){
                                      $status = "已发货";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> <a href='/home/goodok/$v->oid' class='member-touch'>确认收货</a> </p>";
                                  } else {
                                      $status = "已完成";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> 交易完成 </p>";
                                  }
                                  @endphp
                                  <div class="ci5" >
                                      <p>{{$status}}</p>
                                      <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                  </div>
                                  <div class="ci5 ci8" >
                                      {!! $con !!}
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
                              $com = \DB::table('stores')->where('id',$res->company)->first();
                              $color = \DB::table('gcolor')->where('id',$v->color)->first();
                              $size = \DB::table('gsize')->where('id',$v->size)->first();
                          @endphp
                          @if ($v->status == 4)
                          <li>
                             <div class="member-minute clearfix">
                                 <span>{{$v->inputtime}}</span>
                                 <span>订单号：<em>{{$v->ordernum}}</em></span>
                                 <span><a href="#">{{$com->company}}</a></span>
                                 <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                             </div>
                             <div class="member-circle clearfix" >
                                 <div class="ci1">
                                     <div class="ci7 clearfix">
                                         <span class="gr1" >
                                          <a href="/home/goods/{{$res->gid}}">
                                            <img src="{{$v->opic}}" width="60" height="60" title="" about="">
                                          </a>
                                        </span>
                                         <span class="gr2">
                                          <a style="font-size:14px" href="/home/goods/{{$res->gid}}">
                                            {{$v->oname}} {{$color->color}} {{$size->size}}
                                          </a>
                                        </span>
                                         <span class="gr3">X{{$v->num}}</span>
                                     </div>
                                 </div>
                                 <div class="ci2" >
                                  @php
                                    $add = \DB::table('address')->where('aid',$v->addid)->first();
                                  @endphp
                                  @if($add)
                                  {{$add->aname}}
                                  @else
                                  尚无
                                  @endif
                                 </div>
                                 <div class="ci3" ><b>￥{{$v->total}}</b></div>
                                 <div class="ci4" ><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                 @php
                                  if ($v->status == 0){
                                      $status = "无效订单";
                                      $con = "<p> 订单已失效 </p> <p> <a href='/home/myOrderInfo/$v->oid'>查看订单</a> </p>";
                                  } elseif ($v->status == 1){
                                      $status = "等待付款";
                                      $con = "<p> <a href='/home/addorder/$v->oid' class='member-touch'>立即支付</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 2){
                                      $status = "等待卖家发货";
                                      $con = "<p> <a href='javascript:void(0)' class='member-touch'>提醒发货</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 3){
                                      $status = "已发货";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> <a href='/home/goodok/$v->oid' class='member-touch'>确认收货</a> </p>";
                                  } else {
                                      $status = "已完成";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> 交易完成 </p>";
                                  }
                                  @endphp
                                  <div class="ci5" >
                                      <p>{{$status}}</p>
                                      <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                  </div>
                                  <div class="ci5 ci8" >
                                      {!! $con !!}
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
                              $com = \DB::table('stores')->where('id',$res->company)->first();
                              $color = \DB::table('gcolor')->where('id',$v->color)->first();
                              $size = \DB::table('gsize')->where('id',$v->size)->first();
                          @endphp
                          @if ($v->status == 0)
                          <li>
                             <div class="member-minute clearfix">
                                 <span>{{$v->inputtime}}</span>
                                 <span>订单号：<em>{{$v->ordernum}}</em></span>
                                 <span><a href="#">{{$com->company}}</a></span>
                                 <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                             </div>
                             <div class="member-circle clearfix" >
                                 <div class="ci1">
                                     <div class="ci7 clearfix">
                                         <span class="gr1" >
                                          <a href="/home/goods/{{$res->gid}}">
                                            <img src="{{$v->opic}}" width="60" height="60" title="" about="">
                                          </a>
                                        </span>
                                         <span class="gr2">
                                          <a style="font-size:14px" href="/home/goods/{{$res->gid}}">
                                            {{$v->oname}} {{$color->color}} {{$size->size}}
                                          </a>
                                        </span>
                                         <span class="gr3">X{{$v->num}}</span>
                                     </div>
                                 </div>
                                 <div class="ci2" >
                                   @php
                                    $add = \DB::table('address')->where('aid',$v->addid)->first();
                                  @endphp
                                  @if($add)
                                  {{$add->aname}}
                                  @else
                                  尚无
                                  @endif
                                 </div>
                                 <div class="ci3" ><b>￥{{$v->total}}</b></div>
                                 <div class="ci4" ><p>{{date('Y年m月d日',strtotime($v->inputtime))}}</p></div>
                                 @php
                                  if ($v->status == 0){
                                      $status = "无效订单";
                                      $con = "<p> 订单已失效 </p> <p> <a href='/home/myOrderInfo/$v->oid'>查看订单</a> </p>";
                                  } elseif ($v->status == 1){
                                      $status = "等待付款";
                                      $con = "<p> <a href='/home/addorder/$v->oid' class='member-touch'>立即支付</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 2){
                                      $status = "等待卖家发货";
                                      $con = "<p> <a href='javascript:void(0)' class='member-touch'>提醒发货</a> </p> <p> <a href='/home/delorder/$v->oid'>取消订单</a> </p>";
                                  } elseif ($v->status == 3){
                                      $status = "已发货";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> <a href='/home/goodok/$v->oid' class='member-touch'>确认收货</a> </p>";
                                  } else {
                                      $status = "已完成";
                                      $con = "<p> <a href='/home/myOrderInfo/$v->oid'>查看</a> </p> <p> 交易完成 </p>";
                                  }
                                  @endphp
                                  <div class="ci5" >
                                      <p>{{$status}}</p>
                                      <p><a href="/home/myOrderInfo/{{$v->oid}}">订单详情</a></p>
                                  </div>
                                  <div class="ci5 ci8" >
                                      {!! $con !!}
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

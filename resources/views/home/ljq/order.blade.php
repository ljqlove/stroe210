@extends('layout.homes')

@section('title',$title)

@section('js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .table-responsive{
            margin-top:50px;
            border:1px solid #EA4949FF;
            border-top-width: 5px;
            width:90%;
            margin-left:5%;
            border-radius:15px 15px 5px 5px;
        }
        .cart{
            margin-left:5%;
            width:90%;
            border-collapse:collapse;

        }

        .cart th{
            height:50px;
            padding-top:20px;
        }
        .cart td{
            text-align:center;
            height:120px;
            border-top: 1px solid #CCCCCCFF;
        }
        .cart .minus {
            width:35px;
            height:35px;
            border-radius:2px;
            margin-right:0;
        }

        .cart .qty {
            width:50px;
            height:30px;
            text-align: center;
            margin-left:0;
            margin-right:0;
        }

        .cart .plus {
            width:35px;
            height:35px;
            border-radius:2px;
            margin-left:0;
        }
        .table-total{
            border:1px solid #1395FBFF;
            border-top-width: 5px;
            margin-left:5%;
            border-radius:15px 15px 5px 5px;
            width:400px;
            float:right;
            margin-top:100px;
            margin-right:100px;
        }
        .table-total caption{
            font-size:24px;
            padding-top:10px;
            font-family: '楷体';
            font-weight: bold;
        }
        .table-total th{
            padding-top:5px;
            height:40px;
        }
        .cart-total{
            margin-left:5%;
            width:90%;
            border-collapse:collapse;
        }
        .cart-total b{
            color:#F52570FF;
            font-weight: bold;
            font-size:20px;
        }
        .cart-total td{
            border-top: 1px solid #CCCCCCFF;
            text-align:center;
            height:40px;
        }
        .total {
            font-weight: bold;
            font-size:24px;
            color:#0088CCFF;
        }
        #total{
            width:80%;
            height:35px;
            border-radius:5px;
            background:#1395FB7E;
            margin-top:20px;
            margin-bottom:10px;
        }
    </style>
    <script type="text/javascript">
     (function(a){
         a.fn.hoverClass=function(b){
             var a=this;
             a.each(function(c){
                 a.eq(c).hover(function(){
                     $(this).addClass(b)
                 },function(){
                     $(this).removeClass(b)
                 })
             });
             return a
         };
     })(jQuery);

     $(function(){
         $("#pc-nav").hoverClass("current");
     });

     $(document).ready(function($){

         $(".btn1").click(function(event){
             $(".hint").css({"display":"block"});
             $(".box").css({"display":"block"});
         });

         $(".hint-in3").click(function(event) {
             $(".hint").css({"display":"none"});
             $(".box").css({"display":"none"});
         });

         $(".hint3").click(function(event) {
             $(this).parent().parent().css({"display":"none"});
             $(".box").css({"display":"none"});
         });

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

     });
    </script>
    <style>
        .cart-empty{
            /*border:1px solid red;*/
            width:80%;
            height:300px;
            margin-top:80px;
            margin-left:10%;
        }
        .txt{
            font-size:40px;
            font-family:'楷体';
            font-weight:bold;
            /*border:1px solid red;*/
            text-align:center;
            margin-top:60px;
        }
        .ftx-05{
            /*border:1px solid red;*/
            display: block;
            margin-top:100px;
            font-size:24px;
            text-align:center;
        }
        .myadd{
            /*border:1px solid red;*/
        }
        .myadd>li{
            border:5px dashed #7F7F7FFF;
            width:250px;
            height:122px;
            margin:11px;
            border-radius:10px;
            float:left;
        }
        .myadd>li>h3{
            /*border:1px solid red;*/
            margin-top:10px;
            margin-left:10px;
        }
        .myadd>li>span{
            display: block;
            margin-top:10px;
            margin-left:10px;
        }
        .myadd>li>div{
            margin:10px;

        }
        .clear{
            clear:both;
        }
        .myadd>.default{
            border:5px dashed blue;
        }
    </style>
@endsection

@section('sousuo')
    <div class="pc-order-titlei fl"><h2>填写订单</h2></div>
    <div class="pc-step-title fl">
        <ul>
            <li class="cur2"><a href="#">1 . 我的购物车</a></li>
            <li class="cur"><a href="#">2 . 填写核对订单</a></li>
            <li class=""><a href="#">3 . 成功提交订单</a></li>
        </ul>
    </div>
@endsection

@section('content')
    <section>
        <div class="containers">
           <div class="pc-space">
               <div class="pc-order-title clearfix"><h3 class="fl">收货人信息</h3> <a href="#" class="fr pc-order-add btn1">新增收货地址</a> </div>
               <div class="pc-border">
                   <div class="pc-order-text clearfix">
                       <ul class=" myadd">
                            @foreach($add as $v)
                           <li class="add-list">
                                <a style="display:none">{{$v->status}}</a>
                                <h3>{{$v->aname}} (收)</h3>
                                <span>{{$v->aphone}}</span>
                                <div class="address">{{$v->address}}</div>
                           </li>
                           @endforeach

                           <div class="clear"></div>
                       </ul>

                   </div>
               </div>
           </div>
           <div class="pc-space">
                <div class="pc-order-title clearfix"><h3 class="fl">支付方式</h3></div>
                <div class="pc-border">
                    <div class="pc-order-text clearfix">
                        <ul class=" clearfix">
                            <li class="clearfix fl">
                                <div class="fl pc-frame pc-frams"> <a href="#"> 在线支付</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
           <div class="pc-space clearfix">
               <div class="fl ">
                   <div class="pc-order-title clearfix"><h3 class="fl">收货人信息</h3></div>
                   <div class="fr pc-border">
                       <div class="pc-order-text pc-order-l clearfix">
                           <ul id="H-table" class="clearfix H-table">
                               <li class="">
                                   <a href="javascript:void(0);">百事汇通</a>
                               </li>
                               <li class="">
                                   <a href="javascript:void(0);">顺风快递</a>
                               </li>
                               <li class="cur">
                                  <a href="javascript:void(0);">中通快递</a>
                               </li>
                           </ul>
                           <div class="" style="height:211px"></div>
                           <div class="pc-line"></div>
                           <div class="pc-freight"><p>运费：  8.00元</p></div>
                       </div>
                   </div>
               </div>
               <div class="fr ">
                   <div class="pc-order-title clearfix"><h3 class="fl">商品信息</h3></div>
                   <div class="pc-border">
                       <div class="pc-order-text clearfix">
                           <div class="pc-wares-t"><h4>商家：  阿卡官方旗舰店</h4></div>
                           <div class="clearfix pc-wares-p">
                               <div class="fl pc-wares"><a href="#"><img src="theme/img/pd/pc1.png"></a></div>
                               <div class="fl pc-wares-w"> <a href="#">小米（MI）小米USB插线板 3个USB充电口 支持2A快充 3重安全保护</a> <p class="clearfix"><span class="fl">颜色：白色</span><span class="fr">版本：联通高</span></p></div>
                               <div class="fl pc-wares-s"><span class="reds">￥49.00</span><span>x1</span><span>有货</span></div>
                           </div>
                           <div class="clearfix pc-wares-p">
                               <div class="fl pc-wares"><a href="#"><img src="theme/img/pd/pc1.png"></a></div>
                               <div class="fl pc-wares-w"> <a href="#">小米（MI）小米USB插线板 3个USB充电口 支持2A快充 3重安全保护</a> <p class="clearfix"><span class="fl">颜色：白色</span><span class="fr">版本：联通高</span></p></div>
                               <div class="fl pc-wares-s"><span class="reds">￥49.00</span><span>x1</span><span>有货</span></div>
                           </div>
                           <div class="pc-written"><p>订单留言</p></div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="pc-space">
                <div class="pc-order-title clearfix"><h3 class="fl">发票信息</h3></div>
                <div class="pc-border">
                    <div class="pc-order-text clearfix">
                        <ul class=" clearfix">
                            <li class="clearfix fl">
                                <div class="fl pc-address pc-wares-l"><span>普通发票（纸质）</span> <span> 个人</span> <span>明细</span><span><a href="#">修改</a> </span></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
           <div class="clearfix">
               <div class="fr pc-list-t">
                   <ul>
                       <li><span><b>2</b> 件商品，总商品金额：</span> <em>￥558.00</em></li>
                       <li><span>减额：</span> <em>￥558.00</em></li>
                       <li><span>运费：</span> <em>￥558.00</em></li>
                       <li><span>应付总额：</span> <em>￥558.00</em></li>
                       <li><span>减额：</span> <em>￥558.00</em></li>
                   </ul>
               </div>
           </div>
           <div class="pc-space-n"></div>
           <div class="clearfix">
               <div class="fr pc-space-j">
                   <spna>应付总额：<strong>￥558.00</strong></spna>
                   <button class="pc-submit">提交订单</button>
               </div>
           </div>
        </div>
    </section>
@endsection

@section('banner')
    <script>
        var status = $('.add-list a').text();
        console.log(status);
        $('.add-list').mouseover(function(){
            $('this').addClass('default');
        })
    </script>
@endsection
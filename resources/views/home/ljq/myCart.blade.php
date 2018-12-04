@extends('layout.homes')

@section('title',$title)

@section('js')
    <style>
        .table-responsive{
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
        .total{
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
@endsection

@section('sousuo')
    <div class="pc-order-titlei fl"><h2>填写订单</h2></div>
    <div class="pc-step-title fl">
        <ul>
            <li class="cur"><a href="#">1 . 我的购物车</a></li>
            <li class=""><a href="#">2 . 填写核对订单</a></li>
            <li class=""><a href="#">3 . 成功提交订单</a></li>
        </ul>
    </div>
@endsection

@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix alls">
                <div class="table-responsive bottommargin">
                    <table class="table cart">
                        <thead>
                            <tr>
                                <th class="cart-product-thumbnail"><a href="javascript:void(0)" class='quan'>全选</a></th>
                                <!-- <th class="cart-product-thumbnail"><input type="checkbox"><span>全选</span></th> -->
                                <th class="cart-product-thumbnail">商品图片</th>
                                <th class="cart-product-name">商品名</th>
                                <th class="cart-product-price">单价</th>
                                <th class="cart-product-quantity">数量</th>
                                <th class="cart-product-subtotal">小计</th>
                                <th class="cart-product-remove">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $k => $v)
                            <tr class="cart_items">
                                <td class="cart-product-thumbnail">
                                    <input type="checkbox" class='che' gid='{{$v->cid}}'>
                                </td>
                                <td class="cart-product-thumbnail">
                                    <a href="#"><img width="64" height="64" src="{{$v->gimg}}" alt="Pink Printed Dress"></a>
                                </td>
                                <td class="cart-product-name">
                                    <a href="#">{{$v->gname}}</a>
                                </td>
                                <td class="cart-product-price">
                                    <span class="price"><i class="fa fa-jpy" aria-hidden="true"></i> {{$v->price}}</span>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="quantity clearfix">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="1" class="qty" />
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </td>
                                <td class="cart-product-subtotal">
                                    <span class="amount"><i class="fa fa-jpy" aria-hidden="true"></i> {{$v->price}}</span>
                                </td>
                                <td class="cart-product-remove">
                                    <a href="javascript:void(0)" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6 col-md-offset-6 clearfix">
                        <div class="table-total">
                            <table class="cart-total">
                                <caption>购物车结算</caption>
                                <tbody>
                                    <tr class="cart_item">
                                        <th class="cart-product-name">
                                            <strong>合计</strong>
                                        </th>
                                        <th class="cart-product-name">
                                            <span class="total"><i class="fa fa-jpy" aria-hidden="true"></i>106.94</span>
                                        </th>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <strong>已选商品</strong>
                                        </td>
                                        <td class="cart-product-name">
                                            <span class="amount">已选 <b> 0 </b> 件</span>
                                        </td>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name" colspan="2">
                                            <input type="submit" value="结&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;算" id="total">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-empty" style='display:none'>
                <div class="message">
                    <ul>
                        <li class="txt">
                            购物车空空的哦~，去看看心仪的商品吧~
                        </li>
                        <li class="mt10">
                            <a href="/" class="ftx-05">
                                去购物&gt;
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- #content end -->
@endsection

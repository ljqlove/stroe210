@extends('layout.myinfo')
@section('title',$title)
@section('cur1','cur')

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
        .info{
            /*border:1px solid blue;*/
            width:50%;
            margin-left: 25%;
            margin-left:300px;
            font-size: 30px;
        }
        .info #success{
            display: none;
            margin-top:30px;
            height:60px;
            line-height: 60px;
            text-align:center;
            border:5px solid #EA4949FF;
            border-radius:20px;
            background:#37ADEFFF;
        }
        .info #error{
            display: none;
            margin-top:30px;
            height:60px;
            line-height: 60px;
            text-align:center;
            border:5px solid #37ADEFFF;
            border-radius:20px;
            background:#EA4949FF;
        }
    </style>
@endsection

@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="info">
                <div id="success"></div>
                <div id="error"> </div>
            </div>
            <div class="container clearfix alls">
                <form action="/home/order" method="post" id="goform">
                <div class="table-responsive bottommargin">
                    <table class="table cart">
                        <thead>
                            <tr>
                                <th class="cart-product-thumbnail"><a href="javascript:void(0)" class='quan'>全选</a></th>
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
                        @php
                            $res = \DB::table('goods')->where('gname',$v->gname)->first();
                        @endphp
                            <tr class="cart_items">
                                <td class="cart-product-thumbnail">
                                    <input type="checkbox" class='che' name="cid[]" value='{{$v->cid}}'>
                                </td>
                                <td class="cart-product-thumbnail">
                                    <a href="/home/goods/{{$res->gid}}"><img width="64" height="64" src="{{$v->gimg}}" alt="Pink Printed Dress"></a>
                                </td>
                                <td class="cart-product-name">
                                    <a href="/home/goods/{{$res->gid}}">{{$v->gname}}</a>
                                </td>
                                <td class="cart-product-price">
                                    <span class="price"><i class="fa fa-jpy" aria-hidden="true"></i> {{$v->price}}</span>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="quantity clearfix">
                                        <input type="button" value="-" class="minus">
                                        <input type="text"  value="1" class="qty" />
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </td>
                                <td class="cart-product-subtotal">
                                    <span class="amount"><i class="fa fa-jpy" aria-hidden="true"></i> {{$v->price}}</span>
                                </td>
                                <td class="cart-product-remove">
                                    <a href="javascript:void(0)" class="follow" title="join the follow"><i class="fa fa-bookmark" aria-hidden="true"></i> 移入收藏夹</a>
                                    <br>
                                    <a href="javascript:void(0)" class="remove" title="Remove this item"><i class="fa fa-trash" aria-hidden="true"></i> 删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <script>

                    </script>
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
                                            <i class="fa fa-jpy total" aria-hidden="true"></i><span class="total" id="sum">0.0</span>
                                        </th>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <strong>已选商品</strong>
                                        </td>
                                        <td class="cart-product-name">
                                            <span >已选 <b id="num"> 0 </b> 种</span>
                                        </td>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name" colspan="2">
                                            {{csrf_field()}}
                                            <input type="submit" value="结&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;算" id="total">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="cart-empty" style='display:none'>
                <div class="message">
                    <ul>
                        <li class="txt">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>购物车空空的哦~，去看看心仪的商品吧~
                        </li>
                        <li class="mt10">
                            <a href="/" class="ftx-05">
                                去购物 &gt;&gt;&gt;
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </section>
    <!-- #content end -->
    <script>
        // 加
        $('.plus').click(function(){

            //获取数量的值
            var pv = $(this).prev().val();

            pv++;

            $(this).prev().val(pv);

            //库存的问题

            //获取单价
            var prc = $(this).parents('tr').find('.price').text().trim();

            // console.log(prc);
            function accMul(arg1, arg2) {

                var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

                try { m += s1.split(".")[1].length } catch (e) { }

                try { m += s2.split(".")[1].length } catch (e) { }

                return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

            }

            //小计  单价 * pv
            $(this).parents('tr').find('.amount').html('<i class="fa fa-jpy" aria-hidden="true"></i>'+accMul(pv, prc));


            totals()

        })

        //减
        $('.minus').click(function(){

            //获取值
            var pv = $(this).next().val();

            pv--;

            if(pv <= 1){

                pv =1;
            }

            $(this).next().val(pv);


            //获取单价
            var prc = $(this).parents('tr').find('.price').text().trim();

            function accMul(arg1, arg2) {

                var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

                try { m += s1.split(".")[1].length } catch (e) { }

                try { m += s2.split(".")[1].length } catch (e) { }

                return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

            }

            //让小计发生改变
            $(this).parents('tr').find('.amount').html('<i class="fa fa-jpy" aria-hidden="true"></i>'+accMul(prc, pv));

            totals()

        })

        //选责
        $('.che').click(function(){
            totals()
        })


        function totals()
        {
            function accAdd(arg1,arg2){
                var r1,r2,m;
                try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
                try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
                m=Math.pow(10,Math.max(r1,r2))
                return (arg1*m+arg2*m)/m
            }

            var pcr = 0;

            var sum = 0;
            var num = 0;
            var n = 0;
            //遍历
            $(':checkbox:checked').each(function(){

                //获取小计
                pcr = parseFloat($(this).parents('tr').find('.amount').text());

                sum = accAdd(sum, pcr);

                num ++;
                // 获取数量
                var na = $(this).parents('tr').find('.qty').attr('name');
                if (!na) {
                    $(this).parents('tr').find('.qty').attr('name','qty[]');
                }
            })

            //让总计发生改变
            $('#sum').text(sum);
            $('#num').text(num);

        }


        //全选
        $('.quan').click(function(){

            //
            $('.che').attr('checked',true);

            totals()
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //删除数据
        $('.remove').click(function(){

            //提示信息
            var res = confirm('你确定删除吗??');

            if(!res) return;

             //参数发送到控制器中   id
             //获取id
            var gid = $(this).parents('tr').find('.che').val();

            var rem = $(this);
            $.post('/home/shopcart',{gid:gid},function(data){

                if(data == 1){

                    rem.parents('tr').remove();

                    //刷新
                    nums();
                }
            })

        })


        function nums(){
            //获取tr 的数量
            var rs = $('.cart_items').length;
            if(rs == 0){
                // location.reload();
                // location.href='/home/cart';

                $('.cart-empty').show();
                $('.alls').hide();
            }

        }
        nums();

        // 移入到收藏
        $('.follow').click(function(){
            //提示信息
            var res = confirm('商品放入收藏,该商品将会移出购物车,你确定要这样做吗?');

            if(!res) return;

            var gid = $(this).parents('tr').find('.che').val();
            var tr = $(this).parents('tr');
            $.get('/home/follow',{gid:gid},function(data){
                if (data) {
                    $('#success').text('该商品已成功移入收藏').show(500).delay(2000).hide(500);
                    tr.hide();
                    nums()
                } else {
                    $('#error').text('该商品移入收藏失败').show(500).delay(2000).hide(500);
                    nums()
                }
            })
        })
    </script>
@endsection

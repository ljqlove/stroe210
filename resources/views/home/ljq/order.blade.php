@extends('layout.myinfo')

@section('title',$title)
@section('cur1','cur2')
@section('cur2','cur')

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
            cursor:pointer;
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
        .myadd>.move{
            border:5px dashed blue;
        }

        /*留言*/
        .mess{
            width:800px;
            height:20px;
            padding:10px;
            margin-bottom:10px;
        }
        #sadd{
            white-space:nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        #zhifu{
            position:fixed;
            left:30%;
            top:30%;
            border-top:5px solid #E4393CFF;
            border-left:3px solid #E4393CFF;
            border-right:3px solid #E4393CFF;
            border-bottom:1px solid #E4393CFF;
            width:500px;
            height:200px;
            border-radius:15px;
            background-color: #DDD;
        }
        #zhifu span{
            font-weight: bold;
            font-size: 20px;
            margin-top:20px;
            margin-left: 60px;
            /*border:1px solid red;*/
            display: block;
        }
        #zhifu input[type='password']{
            border:1px solid #C1C1C1FF;
            width:40px;
            height:40px;
            line-height: 40px;
            text-align: center;
            margin-top:30px;
        }
        #zhifu input[name='v1']{
            margin-left: 150px;
        }
        #zhifu input[type='submit']{
            width:120px;
            height:30px;
            border-radius: 5px;
            background-color: #E4393CFF;
            color:#fff;
            float:right;
            margin-right:20px;
            margin-bottom:20px;
        }
        #pay{
            position:fixed;
            left:30%;
            top:20%;
            border-top:5px solid #E4393CFF;
            border-left:3px solid #E4393CFF;
            border-right:3px solid #E4393CFF;
            border-bottom:1px solid #E4393CFF;
            width:500px;
            height:300px;
            border-radius:15px;
            background-color: #DDD;
            display: none;
        }
        #pay span{
            font-weight: bold;
            font-size: 20px;
            margin-top:30px;
            margin-left: 40px;
            width:100px;
            height:42px;
            line-height: 40px;
            /*border:1px solid red;*/
            display: block;
            float: left;
        }
        #pay input[type='password']{
            border:1px solid #C1C1C1FF;
            width:40px;
            height:40px;
            line-height: 40px;
            text-align: center;
            float: block;
        }
        #zhifu input[name='v1']{
            margin-left: 150px;
        }
        #pay input[type='submit']{
            width:120px;
            height:30px;
            border-radius: 5px;
            background-color: #E4393CFF;
            color:#fff;
            float:right;
            margin-right:20px;
            margin-bottom:20px;
        }
        .pass{
            float: left;
            margin-top:30px;
            /*border:1px solid red;*/
            width:200px;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="containers">
           <div class="pc-space">
               <div class="pc-order-title clearfix"><h3 class="fl">选择收货地址</h3> <a href="/home/wjd/address" class="fr pc-order-add btn1">新增收货地址</a> </div>
               <div class="pc-border">
                   <div class="pc-order-text clearfix">
                       <ul class="myadd">
                            @foreach($add as $v)
                           <li class="add-list" aid="{{$v->aid}}" oid="{{$ids}}">
                                <a style="display:none" class="status">{{$v->status}}</a>
                                <h3 ><span class="aname">{{$v->aname}}</span> (收)</h3>
                                <span class="aphone">{{$v->aphone}}</span>
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
               <div class="pc-space ">
                   <div class="pc-order-title clearfix"><h3 class="fl">确认订单信息</h3></div>
                   <div class="pc-border">
                       <div class="pc-order-text clearfix">

                           @foreach($data as $v)
                           @php
                           $res = \DB::table('goods')->where('gname',$v->oname)->first();
                           @endphp
                           <div class="pc-wares-t"><h4>商家：  {{$v -> company}}</h4></div>
                           <div class="or">

                           <div class="clearfix pc-wares-p">
                               <div class="fl pc-wares"><a href="/home/goods/{{$res->gid}}"><img width="84" height="84" src="{{$v->opic}}"></a></div>
                               <div class="fl pc-wares-w"> <a href="/home/goods/{{$res->gid}}">{{$v->oname}}</a> <p class="clearfix"><span class="fl">颜色：{{(\DB::table('gcolor')->find($v->color))->color}}</span><span class="fl">大小：{{(\DB::table('gsize')->find($v->size))->size}}</span><span class="fr">版本：联通高</span></p></div>
                               <div class="fl pc-wares-s"><span class="reds" oid="{{$v->oid}}"><i class="fa fa-jpy" aria-hidden="true"></i><b class="zong">{{$v->total}}</b></span><span>x<b class="sn">{{$v->num}}</b></span><span>有货</span></div>
                           </div>
                           <div class="pc-written"><p>订单留言</p><input type="text" class="mess" value="{{$v->msg}}"></div>
                           </div>
                            @endforeach

                       </div>
                   </div>
               </div>
           </div>
           <div class="clearfix">
               <div class="fr pc-list-t">
                   <ul id="zbd">
                       <li><span><b id="sns"></b> 件商品，商品总金额：</span><em style="height:40px" id="st"><i class="fa fa-jpy" aria-hidden="true"></i><a href="javascript:void(0)" class="st">0.0</a></em></li>
                       <li><span>收货人 : </span> <em id="sname"></em></li>
                       <li><span>联系电话：</span> <em id="sph"></em></li>
                       <li><span>配送地址：</span> <em id="sadd" title=""></em></li>
                   </ul>
               </div>
           </div>
           <div class="pc-space-n"></div>
            @php
                $res = DB::table('users')->where('uid',session('userinfo')['uid'])->first();
                if(empty($res->paypwd)){
                    $sta = '0';
                } else {
                    $sta = '1';
                }
            @endphp
           <div class="clearfix">
               <div class="fr pc-space-j">
                   <spna>应付总额：<strong><i class="fa fa-jpy" aria-hidden="true"></i><span class="st">0.0</span></strong></spna>
                   <button class="pc-submit" sta="{{$sta}}">提交订单</button>
               </div>
           </div>
        </div>
    </section>
    <div id="zhifu" style="display: none;">
        <span>请输入支付密码</span>
        <form action="/home/pay/{{$ids}}" method="post">
            {{csrf_field()}}
            <input type="password" autofocus name="v1">
            <input type="password" name="v2">
            <input type="password" name="v3">
            <input type="password" name="v4">
            <br>
            <br>
            <br>
            <input type="submit"  value="确认">
            <div style="clear:both"></div>
        </form>
    </div>
    <div id="pay">
        <form action="/home/pass" method="post">
            {{csrf_field()}}
            <span>支付密码 : </span>
            <div class="pass">
                <input type="password" autofocus name="v[]">
                <input type="password" name="v[]">
                <input type="password" name="v[]">
                <input type="password" name="v[]">
            </div>
            <div style="clear:both"></div>
            <br>
            <br>
            <span>重复密码 : </span>
            <div class="pass">
                <input type="password" name="rv[]">
                <input type="password" name="rv[]">
                <input type="password" name="rv[]">
                <input type="password" name="rv[]">
            </div>
            <div style="clear:both"></div>
            <br>
            <br>
            <br>
            <input type="submit"  value="确认">
        </form>
    </div>
    <script>
        $('.pc-submit').click(function(){
            var sta = $(this).attr('sta');
            if (sta == '1') {
                $('#zhifu').show();
            } else {
                alert('您还没有设置支付密码,请输入一个支付密码!!');
                $('#pay').show();
            }
        })
        $('input[type=password]').keyup(function(event){
            // 将光标跳到下一个
            // console.log($(this).next());
            $(this).next().focus();break;
        })
    </script>
@endsection

@section('banner')
    <script>
        // ajax 修改msg内容
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // 获取总金额赋值给st
        var zong = 0;
        $('.zong').each(function(){
            zong += parseFloat($(this).text());
        })
        $('.st').text(zong);
        // 获取商品个数赋值给sns
        var num = 0;
        $('.sn').each(function(){
            num += Number($(this).text());
        })
        $('#sns').text(num);

        // 默认地址
        $('.status').each(function(){
            // var sta = $(this).text().trim();
            // console.log(sta);
            if ($(this).text().trim() == 1) {
                $(this).parents('li').addClass('default');
            }
        })
        // 获取默认地址信息
        $('#sname').text($('.default .aname').text());
        $('#sph').text($('.default .aphone').text());
        var ad = $('.default .address').text();
        $('#sadd').text(ad);
        $('#sadd').attr('title',ad);

        // 鼠标移动到li中
        $('.add-list').hover(function(){
            $(this).addClass('move');
        },function(){
            $(this).removeClass('move');
        })
        // 点击切换默认地址
        $('.add-list').click(function(){
            zreo();
            $(this).addClass('default');
            // 将默认值赋值给总结表单
            $('#sname').text($(this).find('.aname').text());
            $('#sadd').text($(this).find('.address').text());
            $('#sph').text($(this).find('.aphone').text());
            var aid = $(this).attr('aid');
            var oids = $(this).attr('oid');
            $.get('/home/seladdress',{aid:aid,oids:oids},function(data){
                if(data){
                    alert('地址已修改');
                } else {
                    alert('地址未修改');
                }
                // console.log(data);
            })
        })
        // 全部边框归零
        function zreo(){
            $('.add-list').each(function(){
                $(this).removeClass('default');
            })
        }

       $('.mess').blur(function(){
            var oid = $(this).parents('.or').find('.reds').attr('oid');
            var mess = $(this).val();

            $.post('/home/mess',{oid:oid,mess:mess},function(data){
                console.log(data);
            })
       })
    </script>
@endsection
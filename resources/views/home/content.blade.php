@extends('layout.mymsg')


@section('title',$title)


@section('js')
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta name="renderer" content="webkit">
    <meta content="歪秀购物, 购物, 大家电, 手机" name="keywords">
    <meta content="歪秀购物，购物商城。" name="description">
    <title>会员系统帮助中心</title>
    <link rel="shortcut icon" type="image/x-icon" href="/homes/theme/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/member.css">
    <script type="text/javascript" src="/homes/theme/js/jquery.js"></script>
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
     </script>
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
         $(function(){
             $(".yScrollListInList1 ul").css({width:$(".yScrollListInList1 ul li").length*(160+84)+"px"});
             $(".yScrollListInList2 ul").css({width:$(".yScrollListInList2 ul li").length*(160+84)+"px"});
             var numwidth=(160+84)*4;
             $(".yScrollListInList .yScrollListbtnl").click(function(){
                 var obj=$(this).parent(".yScrollListInList").find("ul");
                 if (!(obj.is(":animated"))) {
                     var lefts=parseInt(obj.css("left").slice(0,-4));
                     if(lefts<60){
                         obj.animate({left:lefts+numwidth},1000);
                     }
                 }
             })
             $(".yScrollListInList .yScrollListbtnr").click(function(){
                 var obj=$(this).parent(".yScrollListInList").find("ul");
                 var objcds=-(60+(Math.ceil(obj.find("li").length/4)-4)*numwidth);
                 if (!(obj.is(":animated"))) {
                     var lefts=parseInt(obj.css("left").slice(0,-4));
                     if(lefts>objcds){
                         obj.animate({left:lefts-numwidth},1000);
                     }
                 }
             })
         })
     </script>
    <script>
         $(function(){
            $("#pro_detail a").hover(function(){
                $("#pro_detail a").removeClass("cur");
                $(this).addClass("cur");
                $("#big_img").attr("src",$(this).attr("simg"));
            });

            $(".attrdiv a").click(function(){
                $(".attrdiv a").removeClass("cur");
                $(this).addClass("cur");
            });

            $('.amount2').click(function(){
                var num_input = $("#subnum");
                var buy_num = (num_input.val()-1)>0?(num_input.val()-1):1;
                num_input.val(buy_num);
            });

            $('.amount1').click(function(){
                var num_input = $("#subnum");
                var buy_num = Number(num_input.val())+1;
                num_input.val(buy_num);
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
     </script>
     <script type="text/javascript">
         $(document).ready(function(){

             $("#firstpane .menu_body:eq(0)").show();
             $("#firstpane h3.menu_head").click(function(){
                 $(this).addClass("current").next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
                 $(this).siblings().removeClass("current");
             });

             $("#secondpane .menu_body:eq(0)").show();
             $("#secondpane h3.menu_head").mouseover(function(){
                 $(this).addClass("current").next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
                 $(this).siblings().removeClass("current");
             });

         });
     </script>

     <script>
    $(".goods").toggle(
        function () {
        $(this).addClass("selected");//添加选中
        },
        function () {
        $(this).removeClass("selected"); //移除选中
        }
        );
    </script>
    <!-- css -->
    <style type="text/css">
      #advert_right{
            width: 150px;
            height: 400px;
            position:fixed;/*声明固定定位*/
            top:180px;
            right:0px;
            z-index: 1000;
        }


        #advert_left{
            width: 150px;
            height: 400px;
            position:fixed;/*声明固定定位*/
            top:180px;
            left:0px;
            z-index: 1000;
        }
        #advert_left div,#advert_right div{
             position: absolute;
             bottom: 16px;
             /*opacity: 0.1;*/
             color:#000;
             cursor:pointer;
        }

    </style>
@endsection


@section('nav')
    <ul class="yMenuIndex">
        <li><a href="" target="_blank">服装城</a></li>
        <li><a href="" target="_blank">美妆馆</a></li>
        <li><a href="" target="_blank">美食</a></li>
        <li><a href="" target="_blank">全球购</a></li>
        <li><a href="" target="_blank">闪购</a></li>
        <li><a href="" target="_blank">团购</a></li>
        <li><a href="" target="_blank">拍卖</a></li>
        <li><a href="" target="_blank">金融</a></li>
        <li><a href="" target="_blank">智能</a></li>
    </ul>
@endsection

@section('content')
    <!-- 广告 -->
    <div id="advert_right">

        @foreach($advert as $k=>$v)
        @if($v->status == 1)
        @if($v->id == 1)
        <div onclick="document.getElementById('advert_right').style.display='none';" >X</div>
        <img src="{{$v->img}}" title="{{$v->name}}" style="width: 150px;
            height: 380px;">
        @endif
        @endif
        @endforeach
    </div>
    <div id="advert_left">
        @foreach($advert as $k=>$v)
        @if($v->status == 1)
        @if($v->id == 2)
        <div onclick="document.getElementById('advert_left').style.display='none';" >X</div>
        <img src="{{$v->img}}" title="{{$v->name}}" style="width: 150px;
            height: 380px;">
        @endif
        @endif
        @endforeach
    </div>
<!-- 商城快讯 begin -->
<section id="member">
    <div class="member-center clearfix">

        <div class="member-right fr">
            <div style="text-align:center;">
                <h1 style="font-weight:bold; font-size:35px; margin:15px auto; ">{{$flash[0]['fname']}}</h1>
                <br>
                <h6>作者署名:{{$flash[0]['writer']}}</h6>
                <br>
                <h6>发布时间:{{$flash[0]['ftime']}}</h6>
                <br>
                <br>
                <br>
                <br>
                {!!$flash[0]['content']!!}
            </div>
    </div>
</section>
<!-- 商城快讯 End -->
@endsection
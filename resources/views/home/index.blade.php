@extends('layout.homes')

@section('js')
    <script type="text/javascript" src="/homes/theme/js/index.js"></script>
    <script type="text/javascript" src="/homes/theme/js/js-tab.js"></script>
    <script type="text/javascript" src="/homes/theme/js/MSClass.js"></script>
    <script type="text/javascript" src="/homes/theme/js/jcarousellite.js"></script>
    <script type="text/javascript" src="/homes/theme/js/top.js"></script>
    <script type="text/javascript">
         var intDiff = parseInt(80000);//倒计时总秒数量
         function timer(intDiff){
             window.setInterval(function(){
                 var day=0,
                         hour=0,
                         minute=0,
                         second=0;//时间默认值
                 if(intDiff > 0){
                     day = Math.floor(intDiff / (60 * 60 * 24));
                     hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                     minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                     second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                 }
                 if (minute <= 9) minute = '0' + minute;
                 if (second <= 9) second = '0' + second;

                 $('#hour_show').html('<s id="h"></s>'+hour+'');
                 $('#minute_show').html('<s></s>'+minute+'');
                 $('#second_show').html('<s></s>'+second+'');
                 intDiff--;
             }, 1000);
         }

         $(function(){
             timer(intDiff);
         });
    </script>
@endsection

@section('title',$title)

@section('content')
   111

@endsection

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
    <div class="header-cart fr"><a href="/home/myCart"><img src="/homes/theme/icon/car.png"></a> <i class="head-amount">99</i></div>
    <div class="head-mountain"></div>
    <!-- 购物车 end -->
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

@section('banner')
    <script type="text/javascript">banner()</script>
@endsection






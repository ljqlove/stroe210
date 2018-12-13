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

@section('title','首页')

@section('content')
    <!--- banner begin-->
    <section id="pc-banner">
        <div class="yBanner">
            @foreach($lunbo as $k=>$v)
            <div class="banner" id="banner" >
                <a href="{{$v->url}}" class="d1" style="background:url({{$v->pic}}) center no-repeat;background-color:#FFFFFF; width:1603px;height: 480px;"></a>
                <div class="d2" id="banner_id">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            @endforeach
            <div style="text-align:center;clear:both"></div>
        </div>
    </section>
    <!-- banner End -->


    <!--- advert begin-->
    <section id="pc-advert">
        <div class="container-c clearfix">
            <a href="page.html" target="_blank"><img src="/homes/theme/img/pd/pd1.png"></a>
            <a href="page.html" target="_blank"><img src="/homes/theme/img/pd/pd2.png"></a>
            <a href="page.html" target="_blank"><img src="/homes/theme/img/pd/pd3.png"></a>
            <a href="page.html" target="_blank"><img src="/homes/theme/img/pd/pd4.png"></a>
        </div>
    </section>
    <!-- advert End -->

    <!-- 商城资讯 begin -->
    <section id="pc-information">
        <div class="containers">
            <div class="pc-info-mess  clearfix" style="position: relative;">
                <h2 class="fl" style="margin-right:20px;">商城快讯</h2>
                <div id="MarqueeDiv" class="MarqueeDiv">
                    @foreach($flash as $v)
                    <a href="/home/flash">{{$v->fname}}</a>
                    @endforeach
                </div>
                <a href="new.html" style="position: absolute;right: 15px;top: 0;"> 更多资讯</a>
            </div>
        </div>
    </section>
    <!-- 商城资讯 End -->

    <!-- 限时抢购 begin -->
    <div class="time-lists clearfix">
        <div class="time-list fl">
            <div class="time-title">
                <h2>限时抢购</h2>
                <div class="time-item clearfix fl" style="padding-left:10px;">
                    <strong id="hour_show">00</strong>
                    <strong class="pc-clear-sr">:</strong>
                    <strong id="minute_show">00</strong>
                    <strong class="pc-clear-sr">:</strong>
                    <strong id="second_show">00</strong>
                </div><!--倒计时模块-->
                <a href="sale-begin.html" class="fr">更多抢购商品</a>
            </div>
            <div class="time-border">
                <div class="yScrollList">
                    <div class="yScrollListIn">
                        <a class="yScrollListbtn yScrollListbtnl" id="prev-01"></a>
                        <div class="yScrollListInList yScrollListInList1 jCarouselLite" style="display:block;margin-left: 20px;" id="demo-01">
                            <ul>
                                @foreach($goods as $vs)
                                <li>
                                    <a href="/home/goods/{{$vs->gid}}" target="_blank">
                                        <img src="{{$vs->gpic}}">
                                        <p class="head-name">{{$vs->gname}}</p>
                                        <p><span class="price">￥{{$vs->price}}</span></p>
                                        <p class="label-default">3.45折</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>


                        </div>
                        <a class="yScrollListbtn yScrollListbtnr" id="next-01"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-list fr">
            <div class="time-title time-clear"><h2>商城快讯</h2><a href="#" class="fr"> 更多资讯</a> </div>
            <div class="time-border" style="border-left:none;">
                <ul class="news">
                    @foreach($flash as $k=>$v)
                    <li><a href="/home/flash">{{$v->fname}}</a> </li>
                    @endforeach
                </ul>
                <div class="time-poduse"><img src="/homes/theme/img/pd/pj1.png"></div>
            </div>
        </div>
    </div>
    <!-- 限时抢购 End -->

    <!-- 卖场推荐 begin -->
    <div class="container-c time-lists clearfix">
        <div class="time-list fl">
            <div class="time-title time-clear"><h2>卖场推荐</h2><a href="javascript:;" class="pc-spin fr">换一换</a> </div>
            <div class="time-poued clearfix">
                <a href="#"><img src="/homes/theme/img/ad/a2.png"></a>
                <a href="#"><img src="/homes/theme/img/ad/a3.png"></a>
                <a href="#"><img src="/homes/theme/img/ad/a4.png"></a>
                <a href="#"><img src="/homes/theme/img/ad/a5.png"></a>
            </div>
        </div>
        <div class="news-list fr">
            <div class="time-title time-clear"><h2>今日值得购买</h2></div>
            <div class="news-right"><a href="#"><img src="/homes/theme/img/ad/a1.png"></a></div>
        </div>
    </div>
    <!-- 卖场推荐 End -->

    <div class="time-lists clearfix">
        <div class="time-list time-list-w fl">
            <div class="time-title time-clear"><h2>热卖区</h2><div class="pc-font fl"></div><a class="pc-spin fr" href="javascript:;">换一换</a> </div>
            <div class="time-border">
                <div class="yScrollList">
                    <div class="yScrollListIn">
                        <div style="display:block;" class="yScrollListInList yScrollListInList1">
                            <ul>
                                @foreach($goods as $vc)
                                <li>
                                    <a href="/home/goods/{{$vc->gid}}">
                                        <img src="{{$vc->gpic}}">
                                        <p class="head-name pc-pa10">{{$vc->gname}}</p>
                                        <p><span class="price">￥{{$vc->price}}</span></p>
                                        <p class="label-default">3.45折</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="containers main-banner"><a href="#"><img src="/homes/theme/img/ad/br1.jpg" width="1200" height="105"></a> </div>

    <div class="time-lists  clearfix">
        <div class="time-list time-list-w fl">
            <div class="time-title time-clear-f"><h2>服装鞋帽</h2>
                <ul class="brand-tab H-table clearfix fr" id="H-table">
                    <li class="cur"><a href="javascript:void(0);" class="cur">男装</a></li>
                    <li><a href="javascript:void(0);">女装</a></li>
                    <li><a href="javascript:void(0);">鞋靴</a></li>
                    <li><a href="javascript:void(0);">箱包</a></li>
                    <li><a href="javascript:void(0);">内衣配饰</a></li>
                    <li><a href="javascript:void(0);">珠宝首饰</a></li>
                    <li><a href="javascript:void(0);">奢品礼品</a></li>
                    <li><a href="javascript:void(0);">奢华腕表</a></li>
                </ul>
            </div>
            <div class="time-border time-border-h clearfix">
                <div class="brand-img fl">
                    <ul>
                        <li><a href="#"><img src="/homes/theme/img/ad/p1.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p2.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p3.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p4.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p5.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p6.png" width="125" height="47"></a></li>
                    </ul>
                </div>
                <div class="brand-bar fl"><a href="#"><img src="/homes/theme/img/ad/bar.jpg" width="300" height="476"></a> </div>
                <div class="brand-poa fl">
                    <div class="brand-poa H-over clearfix">
                        <ul>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar1.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar2.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar3.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar4.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar5.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar1.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                        </ul>
                    </div>
                    <div class="brand-poa H-over clearfix" style="display:none;">
                        <ul>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar5.png"></a></div>
                                <div class="brand-title"><a href="#">松下（Panasonic）智能马桶盖 洁身器 电子坐便盖DL-1109CWS</a> </div>
                                <div class="brand-price">￥299.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar2.png"></a></div>
                                <div class="brand-title"><a href="#">一加（OnePlus）64GB 砂岩黑 移动4G手机</a> </div>
                                <div class="brand-price">￥455.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar1.png"></a></div>
                                <div class="brand-title"><a href="#">【全球购】moony尤尼佳纸尿裤 日本官方进口尿不湿宝宝婴儿尿片 大号L54片(9-14kg)</a> </div>
                                <div class="brand-price">￥299.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar4.png"></a></div>
                                <div class="brand-title"><a href="#">【顺丰包邮】北海道白色恋人黑白巧克力36枚铁盒混合夹心饼干 日本进口零食礼盒中秋送礼送女友</a> </div>
                                <div class="brand-price">￥655.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar5.png"></a></div>
                                <div class="brand-title"><a href="#">便宜坊（Bianyifang）烤鸭 焖炉烤鸭1000g 原味（整只）</a> </div>
                                <div class="brand-price">￥189.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar1.png"></a></div>
                                <div class="brand-title"><a href="#">加拿大进口Polar Bear极地熊牌榛子仁400g</a> </div>
                                <div class="brand-price">￥349.00 </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="time-lists  clearfix">
        <div class="time-list time-list-w fl">
            <div class="time-title time-clear-f2"><h2>美容护肤</h2>
                <ul class="brand-tab H-table1 clearfix fr" id="H-table1">
                    <li class="cur"><a href="javascript:void(0);">男装</a></li>
                    <li><a href="javascript:void(0);">女装</a></li>
                    <li><a href="javascript:void(0);">鞋靴</a></li>
                    <li><a href="javascript:void(0);">箱包</a></li>
                    <li><a href="javascript:void(0);">内衣配饰</a></li>
                    <li><a href="javascript:void(0);">珠宝首饰</a></li>
                    <li><a href="javascript:void(0);">奢品礼品</a></li>
                    <li><a href="javascript:void(0);">奢华腕表</a></li>
                </ul>
            </div>
            <div class="time-border time-border-h clearfix">
                <div class="brand-img fl">
                    <ul>
                        <li><a href="#"><img src="/homes/theme/img/ad/p1.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p2.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p3.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p4.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p5.png" width="125" height="47"></a></li>
                        <li><a href="#"><img src="/homes/theme/img/ad/p6.png" width="125" height="47"></a></li>
                    </ul>
                </div>
                <div class="brand-bar fl"><a href="#"><img src="/homes/theme/img/ad/bar1.jpg" width="300" height="476"></a> </div>
                <div class="brand-poa fl">
                    <div class="brand-poa H-over1 clearfix">
                        <ul>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar1.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar2.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar3.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar4.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar5.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar1.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                        </ul>
                    </div>
                    <div class="brand-poa H-over1 clearfix" style="display:none;">
                        <ul>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar1.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被一羊毛蚕丝被</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar2.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar3.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar4.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar5.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                            <li>
                                <div class="brand-imgss"><a href="#"><img src="/homes/theme/img/pd/bar1.png"></a></div>
                                <div class="brand-title"><a href="#">罗莱家纺 暖融二合一羊毛蚕丝被 床上用品</a> </div>
                                <div class="brand-price">￥599.00 </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="containers main-banner"><a href="#"><img src="/homes/theme/img/ad/br1.jpg" width="1200" height="105"></a> </div>

    <div class="time-lists clearfix">
        <div class="time-list fl">
            <div class="time-title time-clear"><h2>好店推荐 </h2></div>
            <div class="time-border time-border-h clearfix">
                <div class="fl shop-img">
                    <div class="shop-title"><a href="#"><img src="/homes/theme/img/ad/shop1.png"></a></div>
                    <div class="shop-text"><h2>熊太子坚果炒货金冠店铺...</h2> <p>[正品 有赠品 如实描述]</p></div>
                    <div class="shop-work clearfix"><a href="#"><img src="/homes/theme/img/ad/shop2.png"></a><a href="#"><img src="/homes/theme/img/ad/shop3.png"></a> </div>
                </div>
                <div class="shop-bar clearfix fl">
                    <ul>
                        <li>
                            <div class="shop-icn"><a href="#"><img src="/homes/theme/img/ad/shop4.png"></a></div>
                            <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                        </li>
                        <li>
                            <div class="shop-icn"><a href="#"><img src="/homes/theme/img/ad/shop4.png"></a></div>
                            <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                        </li>
                        <li>
                            <div class="shop-icn"><a href="#"><img src="/homes/theme/img/ad/shop4.png"></a></div>
                            <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                        </li>
                        <li>
                            <div class="shop-icn"><a href="#"><img src="/homes/theme/img/ad/shop4.png"></a></div>
                            <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                        </li>
                        <li>
                            <div class="shop-icn"><a href="#"><img src="/homes/theme/img/ad/shop4.png"></a></div>
                            <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                        </li>
                        <li>
                            <div class="shop-icn"><a href="#"><img src="/homes/theme/img/ad/shop4.png"></a></div>
                            <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="news-list fr">
            <div class="time-title time-clear"><h2>店铺销量top排行</h2></div>
            <div style="border-left:none;" class="time-border time-border-h">
                <ul class="shop-top">
                    <li class="clearfix">
                        <div class="shop-name fl"><a href="#"><img src="/homes/theme/img/ad/top1.png"></a></div>
                        <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                    </li>
                    <li class="clearfix">
                        <div class="shop-name fl"><a href="#"><img src="/homes/theme/img/ad/top1.png"></a></div>
                        <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                    </li>
                    <li class="clearfix">
                        <div class="shop-name fl"><a href="#"><img src="/homes/theme/img/ad/top1.png"></a></div>
                        <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                    </li>
                    <li class="clearfix">
                        <div class="shop-name fl"><a href="#"><img src="/homes/theme/img/ad/top1.png"></a></div>
                        <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                    </li>
                    <li class="clearfix">
                        <div class="shop-name fl"><a href="#"><img src="/homes/theme/img/ad/top1.png"></a></div>
                        <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section>
        <div class="time-lists clearfix">
            <div class="time-list time-list-w fl">
                <div class="time-title time-clear"><h2>悦帮派</h2></div>
                <div class="time-border time-border-h clearfix">
                    <div class="fl shop-img">
                        <div class="shop-hgou"><h3>新手上路</h3></div>
                        <div class="shop-help clearfix">
                            <ul>
                                <li><a href="#">开店指南</a> </li>
                                <li><a href="#">购物流程</a> </li>
                                <li><a href="#">交易安全</a> </li>
                                <li><a href="#">常见问题</a> </li>
                                <li><a href="#">联系客服</a> </li>
                                <li><a href="#">用户协议</a> </li>
                            </ul>
                        </div>
                        <div class="shop-re"><a href="#"><img src="/homes/theme/img/ad/shop5.png"></a> </div>
                    </div>
                    <div class="shop-bar shop-bar-w clearfix fl">
                        <div class="shop-dan clearfix"><h3 class="fl">悦用户晒单</h3> <a href="#" class="fr">更多晒单</a> </div>
                        <div class="clearfix" style="width:980px;">
                            <div class="shop-fl fl">
                                <div class="shop-work clearfix"><a href="#"><img src="/homes/theme/img/ad/shop2.png"></a><a href="#"><img src="/homes/theme/img/ad/shop3.png"></a> </div>
                                <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/homes/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                                <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                            </div>
                            <div class="shop-fl fl">
                                <div class="shop-work clearfix"><a href="#"><img src="/homes/theme/img/ad/shop2.png"></a><a href="#"><img src="/homes/theme/img/ad/shop3.png"></a> </div>
                                <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/homes/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                                <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                            </div>
                            <div class="shop-fl fl">
                                <div class="shop-work clearfix"><a href="#"><img src="/homes/theme/img/ad/shop2.png"></a><a href="#"><img src="/homes/theme/img/ad/shop3.png"></a> </div>
                                <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/homes/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                                <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                            </div>
                            <div class="shop-fl fl">
                                <div class="shop-work clearfix"><a href="#"><img src="/homes/theme/img/ad/shop2.png"></a><a href="#"><img src="/homes/theme/img/ad/shop3.png"></a> </div>
                                <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/homes/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                                <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                            </div>
                            <div class="shop-fl fl">
                                <div class="shop-work clearfix"><a href="#"><img src="/homes/theme/img/ad/shop2.png"></a><a href="#"><img src="/homes/theme/img/ad/shop3.png"></a> </div>
                                <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/homes/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                                <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--友情链接标题部分start-->
       <div class="time-lists clearfix">
             <div id="friend_link" >
                        <div id="fri_title">
                          <span>友情链接</span>
                          <hr>
                        </div>
                @foreach($friends as $k=>$v)
                        <div class="fri_content" style="width:150px;float:left;" >
                            <div class="fri_left"><image src="{{$v->fpic}}" width="80" height="80"></div>
                              <p><a href="{{$v->url}}"><strong>{{$v->fname}}</strong></a></p>
                        </div>
                @endforeach
                </div>
        </div>
    <!--友情链接内容部分end-->
@endsection

@section('sousuo')
    <!-- 搜索框 start -->
    <div class="head-form fl">
        <form class="clearfix" href="/home/cate">
            <input type="text" class="search-text" accesskey="" id="key" autocomplete="off" name="gname" placeholder="请输入要搜索的商品">
            <button class="button">搜索</button>
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
        @if($userinfo = session('userinfo'))
        <i class="head-amount set">{{\DB::table('cart')->where('uid',$userinfo['uid'])->count()}}</i>
        @else if($userinfo == 0)
        <i class="head-amount">0</i>
        @endif
        <script>
            $(function(){
                setInterval(function(){
                    $('i[class=set]').toggle();
                },1000)
            })
        </script>
    </div>
    <div class="head-mountain"></div>
    <!-- 购物车 end -->
@endsection

@section('zuo')
    <div class="pullDown">
        <h2 class="pullDownTitle"> 全部商品分类 </h2>
        <ul class="pullDownList">
                <li class="menulihover">
                    <i class="listi1"></i>
                    <a href="all-cl.html" target="_blank">家用电器</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi2"></i>
                    <a href="all-class.html" target="_blank">手机、</a>
                    <a href="all-class.html" target="_blank">数码</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi3"></i>
                    <a href="all-class.html" target="_blank">电脑、</a>
                    <a href="all-class.html" target="_blank">办公</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi4"></i>
                    <a href="all-class.html" target="_blank">家居、</a>
                    <a href="all-class.html" target="_blank">家具、</a>
                    <a href="all-class.html" target="_blank">家装、</a>
                    <a href="all-class.html" target="_blank">厨具</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi5"></i>
                    <a href="" target="_blank">男装、</a>
                    <a href="" target="_blank">女装、</a>
                    <a href="" target="_blank">内衣、</a>
                    <a href="" target="_blank">珠宝</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi6"></i>
                    <a href="" target="_blank">个护化妆</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi7"></i>
                    <a href="" target="_blank">鞋靴、</a>
                    <a href="" target="_blank">箱包、</a>
                    <a href="" target="_blank">钟表、</a>
                    <a href="" target="_blank">奢侈品</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi8"></i>
                    <a href="" target="_blank">运动户外</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi9"></i>
                    <a href="" target="_blank">汽车、</a>
                    <a href="" target="_blank">汽车用品</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi10"></i>
                    <a href="" target="_blank">母婴、</a>
                    <a href="" target="_blank">玩具乐器</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi11"></i>
                    <a href="" target="_blank">食品、</a>
                    <a href="" target="_blank">酒类、</a>
                    <a href="" target="_blank">生鲜、</a>
                    <a href="" target="_blank">特产</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi12"></i>
                    <a href="" target="_blank">营养保健</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi13"></i>
                    <a href="" target="_blank">图书、</a>
                    <a href="" target="_blank">音像、</a>
                    <a href="" target="_blank">电子书</a>
                    <span></span>
                </li>
                <li>
                    <i class="listi14"></i>
                    <a href="" target="_blank">彩票、</a>
                    <a href="" target="_blank">旅行、</a>
                    <a href="" target="_blank">充值、</a>
                    <a href="" target="_blank">票务</a>
                    <span></span>
                </li>
            </ul>
        <!-- 弹框 start -->
        <div class="yMenuListCon">

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>

            <div class="yMenuListConin">
                <div class="yMenuLCinLisi fl">
                    <ul>
                        <li><a href="#">大家电<i class="fr">></i></a></li>
                        <li><a href="#">生活电器<i class="fr">></i></a></li>
                        <li><a href="#">厨房电器<i class="fr">></i></a></li>
                        <li><a href="#">个护健康<i class="fr">></i></a></li>
                        <li><a href="#">五金家装<i class="fr">></i></a></li>
                    </ul>
                </div>
                <div class="yMenuLCinList fl">
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>

                    <p>
                        <a href="" class="ecolor610">大牌上新</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                        <a href="">商场同款</a>
                        <a href="">男装集结</a>
                        <a href="">羽绒服</a>
                        <a href="">加厚羽绒 </a>
                        <a href="">高帮鞋</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- 弹框 end -->
    </div>
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






@extends('layout.homes')


@section('title',$title)
<script src='./jquery-1.8.3.min.js'></script>

@section('js')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>


        .pc-product-top{cursor:move;}

        #move{
            width: 160px;
            height: 160px;
         /*   position:absolute;
            left:100px;
            top:100px;
            background: url('/homes/theme/img/bg/bg.png');*/
            display:none;

        }

        #big{
            width:400px;height: 400px;position:absolute;left:650px;top:240px;overflow:hidden;display:none;
        }

        #bigImg{
            position:absolute;

        }

        #uls{
            width:400px;
            height:84px;

            position:absolute;
            /*left:30px;
            top:460px;*/
        }

        #uls li{
            width: 80px;
            height: 80px;
            /*border: solid 1px green;*/
            float:left;
            list-style:none;
            margin-right:5px;
        }
    </style>

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
    <section>

    <div class="pc-details" >
        <div class="containers">

            <div class="pc-details-l">
                <div class="pc-product clearfix">
                    <div class="pc-product-h">
                        <div class="pc-product-top"><img src="{{$goods[0]['gpic']}}" id="big_img" width="418" height="418"><div id='move'></div><div id='big'><img src="{{$goods[0]['gpic']}}" alt="" id='bigImg'></div></div>


                        <div class="pc-product-bop clearfix" id="pro_detail">
                            <ul id='uls'>
                                <li><a href="javascript:void(0);" simg="{{$goods[0]['gpic']}}"><img src="{{$goods[0]['gpic']}}" width="58" height="58"></a> </li>

                                @foreach($gimgs as $k => $v)
                                <li><a href="javascript:void(0);" simg="{{$v->gimgs}}"><img src="{{$v->gimgs}}" width="58" height="58"></a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                        <script>
                        //移动事件
                        $('.pc-product-top').mousemove(function(e){

                            $('#move').css('display','block');
                            $('#big').css('display','block');


                            //获取small的左侧偏移量
                            var sl = $('.pc-product-top').offset().left;
                            var st = $('.pc-product-top').offset().top;

                            //获取x和y的坐标
                            // var x = e.clientX;
                            // var y = e.clientY;

                            var x = e.pageX;
                            var y = e.pageY;

                            //获取move的宽和高
                            var mw = $('#move').width()/2;
                            var mh = $('#move').height()/2;

                            //求出 move距离small的偏移量
                            var ml = x - sl - mw;
                            var mt = y - st - mh;


                            var maxl = $('.pc-product-top').width()-$('#move').width();

                            var maxt = $('.pc-product-top').height()-$('#move').height();

                            if(ml >= maxl){

                                ml = maxl;
                            }
                            if(ml <= 0){
                                ml = 0;
                            }

                            if(mt >= maxt){

                                mt = maxt;
                            }
                            if(mt <= 0){
                                mt = 0;
                            }

                            //获取大图距离big 的偏移量
                            var bl = $('#bigImg').width() / $('.pc-product-top').width() * ml;
                            var bt = $('#bigImg').height() / $('.pc-product-top').height() * mt;


                            $('#bigImg').css('left',-bl+'px');
                            $('#bigImg').css('top',-bt+'px');


                            $('#move').css('left',ml+'px');
                            $('#move').css('top',mt+'px');


                        })

                        //从small移出来
                        $('.pc-product-top').mouseout(function(){

                            $('#move').css('display','none');
                            $('#big').css('display','none');

                        })

                        //鼠标移到小图上
                        $('#uls').find('img').mouseover(function(){

                            $(this).css('border','solid 1px #e53e41 ');

                            var srcs = $(this).attr('src');

                            //改变small里面的src
                            $('.pc-product-top').find('img').attr('src',srcs);

                            //改变big里面的src
                            $('#big').find('img').attr('src',srcs);

                        })

                        $('#uls').find('img').mouseout(function(){

                            $(this).css('border','solid 1px white');
                        })

                    </script>

                    <div class="pc-product-t">
                        <div class="pc-name-info">
                            <h1>{{$goods[0]['gname']}}</h1>
                            <a href="#" id="gid" style="display: none;">{{$goods[0]['gid']}}</a>
                            <p class="clearfix pc-rate" "><strong id="price">{{$goods[0]['price']}}.00</strong> </p>
                            <p>由<a href="#" class="reds">{{$goods[0]['company']}}</a> 负责发货，并提供售后服务。</p>
                        </div>
                        <div class="pc-dashed clearfix">
                            <span>累计销量：<em class="reds">3988</em> 件</span><b>|</b><span>累计评价：<em class="reds">3888</em></span>
                        </div>
                        <div class="pc-size">
                            <div class="attrdiv pc-telling clearfix">
                                <div class="pc-version">商品尺寸</div>
                                <div class="pc-adults">
                                    <ul>
                                        <li><a href="javascript:void(0);" class="gsize">{{$goods[0]['size']}}</a></li>
                                        {{-- @foreach($gsize as $k=>$v --)}}
                                        <li><a href="javascript:void(0);" class="size">{{-- $v->gsize --}}</a> </li>
                                        {{-- @endforeach --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="pc-telling clearfix">
                                <div class="pc-version">颜色分类</div>
                                <div class="pc-adults">
                                    <ul>
                                        <li><a href="javascript:void(0);" class="goods" ><img src="{{$goods[0]['gpic']}}" width="35" height="35"></a> </li>
                                        @foreach($gsize as $k=>$v)
                                        <li ><a class="pc" data-id="{{$v->id}}" href="javascript:void(0);" title="{{$v->gcolor}}" onclick="gsize(this);" class="size"><img src="{{$v->cimgs}}" width="35" height="35"></a> </li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>
                            <script>
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $('.size').click(function(){
                                    var size = $(this).text();
                                    var gid = $('#gid').text();
                                    // ajax获取size对应的price
                                    // larvel中ajax meta cfsc
                                    // js header text --_token
                                    $.get('/home/gsize',{gid:gid},function(data){
                                         $('#price').text({{$v->gpic}});
                                    });
                                    // 控制器里头就可以接受值
                                    // ajax获取price

                                $('.gsize').click(function(){
                                    // alert('11111111');
                                    var gsize = $(this).text();
                                     $.get('/home/gsize',{gid:gid},function(data){
                                         $('#price').text({{$v->gpic}});
                                    });
                                    // 控制器
                                });

                                function gsize(obj) {
                                   $('.pc').removeClass('cur');
                                    $(obj).addClass('cur');
                                    var sid = $(obj).attr("data-id");

                                    $.ajax({
                                        async: false,
                                        url: "/home/ajaxgsize",
                                        data: {
                                            sid:sid,
                                            _token:'{{csrf_token()}}'
                                        },
                                        type: "POST",
                                        dataType: "json",
                                        success: function(data) {
                                            if(data.status == 1){
                                                // console.log(data);
                                                $('#price').text(data.list.gpic);

                                            } else {
                                                alert('查询失败');
                                            }

                                        }
                                    });
                                }
                            </script>
                            <div class="pc-telling clearfix">
                                <div class="pc-version">数量</div>
                                <div class="pc-adults clearfix">
                                    <div class="pc-adults-p clearfix fl">
                                        <input type="" id="subnum" placeholder="1">
                                        <a href="javascript:void(0);" class="amount1"></a>
                                        <a href="javascript:void(0);" class="amount2"></a>
                                    </div>
                                    <div class="fl pc-letter ">件</div>
                                    <div class="fl pc-stock ">库存<em>{{$goods[0]['stock']}}</em>件</div>
                                </div>
                            </div>
                            <div class="pc-number clearfix"><span class="fl">商品编号：{{$goods[0]['gid']}}   </span> <span class="fr">
                                <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a></div>
                                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","weixin","sqq","youdao","tieba"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","weixin","sqq","youdao","tieba"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                            </span></div>
                        </div>
                        <div class="pc-emption">
                            <a href="#">立即购买</a>
                            <a href="/home/join/{{$goods[0]['gid']}}" class="join">加入购物车</a>
                        </div>
                    </div>

                    <div class="pc-product-s">
                        <div class="pc-shoplo"><a href="#"><img src="theme/icon/shop-logo.png"></a> </div>
                        <div class="pc-shopti">
                            <h2>神游官方旗舰店</h2>
                            <p>公司名称：优购科技有限公司</p>
                            <p>所在地： 广东省   深圳市</p>
                        </div>
                        <div class="pc-custom"><a href="#">联系客服</a> </div>
                        <div class="pc-trigger">
                            <a href="#">进入店铺</a>
                            <a href="#" style="margin:0;">关注店铺</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="containers clearfix" style="margin-top:20px;">
        <div class="fl">
            <div class="pc-menu-in">
                <h2>店内搜索</h2>
                <form>
                    <p>关键词:<input type="text" class="pc-input1"></p>
                    <p>价  格：<input class="pc-input2"> 到 <input class="pc-input2"></p>
                    <p><a href="#">搜索</a> </p>
                </form>
            </div>
            <div class="menu_list" id="firstpane">
                <h2>店内分类</h2>
                <h3 class="menu_head current">电玩</h3>
                <div class="menu_body" style="display: none;">
                    <a href="#">耳机耳麦</a>
                    <a href="#">游戏机</a>
                </div>
                <h3 class="menu_head">手机</h3>
                <div class="menu_body" style="display: none;">
                    <a href="#">手机</a>
                    <a href="#">手机</a>
                    <a href="#">手机</a>
                </div>

                <h3 class="menu_head">耳机耳麦</h3>
                <div class="menu_body" style="display: none;">
                    <a href="#">耳机耳麦</a>
                    <a href="#">耳机耳麦</a>
                    <a href="#">耳机耳麦</a>
                    <a href="#">耳机耳麦</a>
                </div>
            </div>
        </div>
        <div class="pc-info fr">
            <div class="pc-overall">
                <ul id="H-table1" class="brand-tab H-table1 H-table-shop clearfix ">
                    <li class="cur"><a href="javascript:void(0);">商品介绍</a></li>
                    <li><a href="javascript:void(0);">商品评价<em class="reds">(91)</em></a></li>
                    <li><a href="javascript:void(0);">售后保障</a></li>
                </ul>
                <div class="pc-term clearfix">
                   <div class="H-over1 pc-text-word clearfix">
                       <ul class="clearfix">
                           <li>
                               {!!$goods[0]['descript']!!}
                           </li>

                       </ul>

                   </div>
                   <div class="H-over1" style="display:none">
                       <div class="pc-comment fl"><strong>86<span>%</span></strong><br> <span>好评度</span></div>
                       <div class="pc-percent fl">
                           <dl>
                               <dt>好评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>中评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>好评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                       </div>
                   </div>
                   <div class="H-over1 pc-text-title" style="display:none">
                       <p>本产品全国联保，享受三包服务，质保期为：一年质保
                           如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！
                           (注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......</p>
                       <div class="pc-line"></div>
                   </div>
                </div>
            </div>
            <div class="pc-overall">
             <!--    <ul class="brand-tab H-table H-table-shop clearfix " id="H-table" style="margin-left:0;">
                    <li class="cur"><a href="javascript:void(0);">全部评价（199）</a></li>
                    <li><a href="javascript:void(0);">好评<em class="reds">（33）</em></a></li>
                    <li><a href="javascript:void(0);">中评<em class="reds">（02）</em></a></li>
                    <li><a href="javascript:void(0);">差评<em class="reds">（01）</em></a></li>
                </ul>
                <div class="pc-term clearfix">
                    <div class="pc-column">
                        <span class="column1">评价心得</span>
                        <span class="column2">顾客满意度</span>
                        <span class="column3">购买信息</span>
                        <span class="column4">评论者</span>
                    </div> -->
                    @foreach($comment as $vbc)
                   <div class="H-over  pc-comments clearfix">
                        <ul class="clearfix">
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>{{$vbc->content}}</p>
                                    <p class="column5">{{$vbc->inputtime}}</p>
                                </div>
                                <div class="column2">@if($vbc->star==1)★
                                                    @elseif($vbc->star==2)★★
                                                    @elseif($vbc->star==3)★★★
                                                    @elseif($vbc->star==4)★★★★
                                                    @elseif($vbc->star==5)★★★★★
                                                    @endif</div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
<!--             <div class="clearfix">
                <div class="fr pc-search-g pc-search-gs">
                    <a href="#" class="fl " style="display:none">上一页</a>
                    <a class="current" href="#">1</a>
                    <a href="javascript:;">2</a>
                    <a href="javascript:;">3</a>
                    <a href="javascript:;">4</a>
                    <a href="javascript:;">5</a>
                    <a href="javascript:;">6</a>
                    <a href="javascript:;">7</a>
                    <span class="pc-search-di">…</span>
                    <a href="javascript:;">1088</a>
                    <a href="javascript:;" class="" title="使用方向键右键也可翻到下一页哦！">下一页</a>
                </div>
            </div> -->
        </div>
    </div>
</section>


@endsection

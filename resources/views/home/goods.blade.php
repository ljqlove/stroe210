@extends('layout.mymsg')

@section('title',$title)

@section('js')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        #small{
            position: relative;
        }
        #bigImg{
            position:absolute;
        }
        #big{
            width:400px;
            height:400px;
            position:absolute;
            left:550px;
            top:220px;
            overflow: hidden;
            display: none
        }
        #move{
            width:200px;
            height:200px;
            background-image:url('/images/bg.png');
            position:absolute;
            display: none;
            cursor:move;
            left:0px;
            top:0px;
        }

        #advert_right{
            width: 150px;
            height: 400px;
            position:fixed;/*声明固定定位*/
            top:180px;
            right:0px;
        }

        #advert_left{
            width: 150px;
            height: 400px;
            position:fixed;/*声明固定定位*/
            top:180px;
            left:0px;
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
@endsection


@section('nav')
    <ul class="yMenuIndex">
        @foreach($type as $v)
        <li><a href="" target="_blank">{{$v->tname}}</a></li>
        @endforeach
    </ul>
@endsection

@section('content')
    <section>
        <div id='big'>
            <img src="{{$goods['gpic']}}" alt="" id='bigImg'>

        </div>
    <div class="pc-details" >
        <div class="containers">

            <div class="pc-details-l">
                <div class="pc-product clearfix">
                    <div class="pc-product-h">
                        <div class="pc-product-top" id="small"><img src="{{$goods['gpic']}}" id="smallImg" width="418" height="418">
                        <div id='move'></div>

                        </div>


                        <div class="pc-product-bop clearfix" id="pro_detail">
                            <ul id='uls'>
                                @foreach($gcolor as $k => $v)
                                <li><a href="javascript:void(0);" simg="{{$v->id}}" class="size"><img class="lun" src="{{$v->pictrue}}" width="58" height="58"></a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>



                    <div class="pc-product-t">
                        <div class="pc-name-info">
                            <h1 id="gname">{{$goods['gname']}}</h1>
                            <a href="#" id="gid" style="display: none;">{{$goods['gid']}}</a>
                            <p class="clearfix pc-rate" "><strong id="price"><i class="fa fa-jpy" aria-hidden="true"></i> {{$goods['price']}}.00</strong> </p>
                            <p>由<a href="#" class="reds">{{$stroe->company}}</a> 负责发货，并提供售后服务。</p>
                        </div>
                        <div class="pc-dashed clearfix">
                            <span>累计销量：<em class="reds">3988</em> 件</span><b>|</b><span>累计评价：<em class="reds">{{count($comment)}}</em></span>
                        </div>
                        <div class="pc-size">
                            <div class="attrdiv pc-telling clearfix">
                                <div class="pc-version">商品尺寸</div>
                                <div class="pc-adults chicun">
                                    <ul>
                                        @foreach($gsize as $k=>$v)
                                        <li><a href="javascript:void(0);" sid="{{$v->id}}" class="size">{{ $v->size }}</a> </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="pc-telling clearfix">
                                <div class="pc-version">颜色分类</div>
                                <div class="pc-adults yanse">
                                    <ul>
                                        @foreach($gcolor as $k=>$v)
                                        <li ><a   href="javascript:void(0);" title="{{$v->color}}" class="pca"><img src="{{$v->pictrue}}" class="pc" cid="{{$v->id}}" width="35" height="35"></a> </li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="pc-telling clearfix">
                                <div class="pc-version">数量</div>
                                <div class="pc-adults clearfix">
                                    <div class="pc-adults-p clearfix fl" style="width:100px;" >
                                        <a href="javascript:void(0);" class="amount2" style="border:1px solid #ddd;width:20px;height:30px;line-height: 30px;text-align: center;margin:0 2px;"> - </a>
                                        <input type="text" id="subnum" value="1">
                                        <a href="javascript:void(0);" class="amount1" style="border:1px solid #ddd;width:20px;height:30px;line-height: 30px;text-align: center;margin:0 2px;"> + </a>
                                    </div>
                                    <div class="fl pc-letter ">件</div>
                                    <div class="fl pc-stock ">库存<em>{{$goods['stock']}}</em>件</div>
                                </div>
                            </div>
                            <div class="pc-number clearfix"><span class="fl">商品编号：{{$goods['gid']}}   </span> <span class="fr">
                                <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a></div>
                                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","weixin","sqq","youdao","tieba"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","weixin","sqq","youdao","tieba"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                            </span></div>
                        </div>
                        @php
                            $href = 'javascript:(0)';
                            if(empty(session('userinfo'))){
                                $href = '/home/login';
                            }
                        @endphp
                        <div class="pc-emption">
                            <a href="{{$href}}" id="mall" style="cursor: not-allowed;">立即购买</a>
                            <a href="{{$href}}" id="join" style="cursor: not-allowed;">加入购物车</a>
                        </div>
                    </div>
                        <script>

                        </script>
                    <div class="pc-product-s">
                        <div class="pc-shoplo">
                            <a href="#"><img width="180" height="80" src="{{$stroe->image}}"></a>
                        </div>
                        <div class="pc-shopti">
                            <h2></h2>
                            <p>店铺名称：{{$stroe->company}}</p>
                            <p><b>{{ceil((time()-strtotime($stroe->create_at))/(3600*24*30*12))}}</b>年老店</p>

                            <p>掌柜： {{$stroe->uname}}</p>
                        </div>
                        <div class="pc-custom"><a href="#">联系客服</a> </div>
                        <div class="pc-trigger">
                            <a href="/home/stroe/{{$stroe->id}}">进入店铺</a>
                                @php
                                    $res = DB::table('collect')->where('uid',session('userinfo')['uid'])->where('sid',$stroe->id)->first();
                                @endphp
                                @if(!empty($userinfo = session('userinfo')))

                                    @if(!$res)
                                        <a href="/home/collect/{{$stroe->id}}" style="margin:0;">收藏店铺</a>
                                    @else
                                        <a href="javascript:void(0)" style="margin:0;">已收藏</a>
                                    @endif
                                @else
                                    <a href="/home/collect/{{$stroe->id}}" style="margin:0;">收藏店铺</a>
                                @endif
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
                    <li><a href="javascript:void(0);">商品评价<em class="reds"></em></a></li>
                    <li><a href="javascript:void(0);">售后保障</a></li>
                </ul>
                <div class="pc-term clearfix">
                   <div class="H-over1 pc-text-word clearfix">
                       <ul class="clearfix">
                           <li>
                               {!!$goods['descript']!!}
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // 颜色图片选择
        $('.pc').click(function(){
            var cid = $(this).attr('cid');
            var img = $(this).attr('src');
            $('#smallImg').attr('src',img);
            $('#bigImg').attr('src',img);
            $('.pca').removeClass('cur');
            $(this).parent().addClass('cur');
            var res = $('.chicun').find('.cur').length;
            if (res) {
                $('#mall').css('cursor','pointer');
                $('#join').css('cursor','pointer');
                $('#mall').css('background','#EA4949FF');
                $('#join').css('background','#EA4949FF');
                $('#mall').css('color','#fff');
                $('#join').css('color','#fff');
            }
        })

        // 大小尺寸选择
        $('.size').click(function(){
            var sid = $(this).attr('sid');
            $('.size').removeClass('cur');
            $(this).addClass('cur');
            // ajax获取size对应的price
            // larvel中ajax meta cfsc
            // js header text --_token
            $.get('/home/ajaxgsize',{sid:sid},function(data){
                 $('#price').html('<i class="fa fa-jpy" aria-hidden="true"></i> '+data+'.00');
            });
            // 控制器里头就可以接受值
            // ajax获取price
            var res = $('.yanse').find('.cur').length;
            if (res) {
                $('#mall').css('cursor','pointer');
                $('#join').css('cursor','pointer');
                $('#mall').css('background','#EA4949FF');
                $('#join').css('background','#EA4949FF');
                $('#mall').css('color','#fff');
                $('#join').css('color','#fff');
            }
        })

        // 图下轮播
        $('.lun').mouseover(function(){
            var img = $(this).attr('src');
            $('#smallImg').attr('src',img);
            $('#bigImg').attr('src',img);
            $('.size').removeClass('cur');
            $(this).parent().addClass('cur');
        })

        // 绑定鼠标移动事件
        $('#small').mousemove(function(e){
            $('#move').css('display','block');
            $('#big').css('display','block');

            // 获取small的左侧偏移量
            var sl = $('#small').offset().left;
            var st = $('#small').offset().top;

            // 获取x和y的坐标
            var x = e.pageX;
            var y = e.pageY;

            // 获取move的宽和高
            var mw = $('#move').width()/2;
            var mh = $('#move').height()/2;

            // 求出move距离 small的偏移量
            var ml = x - sl - mw;
            var mt = y - st - mh;

            var maxl = $('#small').width()-$('#move').width();
            var maxt = $('#small').height()-$('#move').height();

            if (ml >= maxl) {
                ml = maxl;
            }

            if (ml <= 0) {
                ml = 0;
            }

            if (mt >= maxt) {
                mt = maxt;
            }

            if (mt <= 0) {
                mt = 0;
            }

            // 获取大图距离big的偏移量
            var bl = $('#bigImg').width() / $('#small').width() * ml;
            var bt = $('#bigImg').height() / $('#small').height() * mt;

            $('#bigImg').css('left',-bl+'px');
            $('#bigImg').css('top',-bt+'px');

            $('#move').css('left',ml+'px');
            $('#move').css('top',mt+'px');
        })

        // 从small移出来
        $('#small').mouseout(function(){
            $('#move').css('display','none');
            $('#big').css('display','none');
        })

        // -
        $('.amount2').click(function(){
            var num_input = $("#subnum");
            var buy_num = (num_input.val()-1)>0?(num_input.val()-1):1;
            num_input.val(buy_num);
        });

        // +
        $('.amount1').click(function(){
            var num_input = $("#subnum");
            var buy_num = Number(num_input.val())+1;
            num_input.val(buy_num);
        });

        // 加入购物车
        $('#join').click(function(){
            var rs1 = $('.yanse').find('.cur').length;
            var rs2 = $('.chicun').find('.cur').length;

            if (rs1 != 1 || rs2 != 1) {
                alert('请先选择颜色和尺寸');return;
            }

            var j = $(this);
            var gname = $('#gname').text();
            var price = $('#price').text();
            var size = $('.chicun').find('.cur').attr('sid');
            var color = $('.yanse .cur img').attr('cid');
            var gimg = $('.yanse .cur img').attr('src');
            var num = $('#subnum').val();
            // console.log(gname,price,gsize,gcolor,gimg,num);
            $.post('/home/joinCart',{gname:gname,price:price,size:size,color:color,gimg:gimg,num:num},function(data){
                if(data){
                    var clone = j.clone(true);
                    j.before(clone);
                    clone.css('position','absolute');
                    clone.animate({
                        right:'280px',
                        top:'100px',
                        width:'0px',
                        borderRadius:'50%',
                    },1500)
                    clone.hide(1500);
                    setTimeout(function(){
                        var n = Number($('#setl').text());
                        $('#setl').text(n+1);
                    },3000)
                } else {
                    alert('加入购物车失败,或该商品已经在购物车中');
                }
            })
        })

        // 立即购买
        $('#mall').click(function(){
            var rs1 = $('.yanse').find('.cur').length;
            var rs2 = $('.chicun').find('.cur').length;
            if (rs1 != 1 || rs2 != 1) {
                alert('请先选择颜色和尺寸');return;
            }
            var gname = $('#gname').text();
            var price = $('#price').text();
            var size = $('.chicun').find('.cur').attr('sid');
            var color = $('.yanse .cur img').attr('cid');
            var gimg = $('.yanse .cur img').attr('src');
            var num = $('#subnum').val();
            // console.log(gname,price,size,color,gimg,num);
            $.post('/home/joinorder',{oname:gname,price:price,size:size,color:color,opic:gimg,num:num},function(data){
                location.href='/home/addorder/'+data;
            })
        })
    </script>

@endsection

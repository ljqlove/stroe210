@extends('layout.homes')

@section('title',$title)

@section('sousuo')
    <!-- 搜索框 start -->
    <div class="head-form fl">
        <form class="clearfix" action="/home/sousuo" method="get">
            {{csrf_field()}}
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
        <i class="head-amount" id="setl">{{\DB::table('cart')->where('uid',$userinfo['uid'])->count()}}</i>
        @elseif($userinfo == 0)
        <i class="head-amount">0</i>
        @endif
        <script>
            $(function(){
                setInterval(function(){
                    $('#setl').toggle();
                },1000)
            })
        </script>
    </div>
    <div class="head-mountain"></div>
    <!-- 购物车 end -->
@endsection

@section('content')
    <div class="containers clearfix">
    <div class="fl">
        <div class="time-border-list pc-search-list clearfix">
           <li>
            <h2>新品推荐</h2><br>
                <a href="/home/goods/{{$good->gid}}"> <img src="{{$good->gpic}}" style="width: 200px; height:300;"></a>
                <p class="head-name" style="height:40px;overflow: hidden;text-overflow:ellipsis;display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><a href="/home/goods/{{$good->gid}}">{{$good->gname}}</a> </p>
                <p><span class="price">￥ {{$good->price}}.00</span></p>
                <p class="head-futi clearfix"><span class="fl">有货:{{$good->stock}}件</span> <a href="/home/stroe/{{$good->company}}" class="fr">{{$good->com}}</a></p>
                <p class="clearfix"><span class="label-default fl">抢购</span>

                    @if(!empty($userinfo = session('userinfo')))
                        @php
                            $res = DB::table('collect')->where('uid',$userinfo['uid'])->where('gid',$good->gid)->first();
                        @endphp

                        @if(!$res)
                            <a href="javascript:void(0)" sta="0" gid="{{$good->gid}}" class="col fr pc-search-c">收藏</a>
                        @else
                            <a href="javascript:void(0)" sta="1" gid="{{$good->gid}}" class="col fr pc-search-c">已收藏</a>
                        @endif
                    @else
                        <a href="javascript:void(0)" sta="0" gid="{{$good->gid}}" class="col fr pc-search-c">收藏</a>
                    @endif

                </p>
            </li>
        <br>
        </div>
    </div>

    <div class="pc-info fr">
        <div class="pc-term">
            <form action="/home/sousuo" method="get" name="form1" id="orform">
            {{csrf_field()}}
            <div class="clearfix pc-search-p">
                <div class="fl pc-search-e"><a href="javascript:void(0)" class="cur">排序</a>
                    <!-- <a href="#">销量</a> -->
                    <input type="hidden" name="order" value="asc" id="order">
                    <input type="hidden" name="gname" value="{{$title}}">
                    <a href="javascript:document.form1.submit();" name="order" value="down" id="price-down">价格 <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                    <a href="javascript:void(0);" name="order" value="up" id="price-up">价格 <i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
                    <!-- <a href="#">评价</a> -->
                </div>
               <div class="fr pc-search-v">
                    <ul>
                        <li><input type="checkbox" checked><a href="javascript:void(0)">有货</a> </li>
                    </ul>
                </div>
            </div>
            </form>
           <!-- <div class="pc-search-i">
                <div class="fr">
                    <span class="pc-search-t"><b>1</b><em>/</em><i>32</i></span>
                    <a href="#" class="pc-search-d">上一页</a>
                    <a href="#">下一页</a>
                </div>
            </div> -->
                    </div>
        <div class="time-border-list pc-search-list clearfix">
            <ul class="clearfix">
                @foreach($goods as $v)
                <li>
                    <a href="/home/goods/{{$v->gid}}"> <img src="{{$v->gpic}}" style="width: 200px; height:300;"></a>
                    <p class="head-name" style="height:40px;overflow: hidden;text-overflow:ellipsis;display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><a href="/home/goods/{{$v->gid}}">{{$v->gname}}</a> </p>
                    <p><span class="price">￥ {{$v->price}}.00</span></p>
                    <p class="head-futi clearfix"><span class="fl">有货:{{$v->stock}}件</span> <a href="/home/stroe/{{$v->company}}" class="fr">{{$v->com}}</a></p>
                    <p class="clearfix"><span class="label-default fl">抢购</span>

                                @if(!empty($userinfo = session('userinfo')))
                                    @php
                                        $res = DB::table('collect')->where('uid',$userinfo['uid'])->where('gid',$v->gid)->first();
                                    @endphp

                                    @if(!$res)
                                        <a href="javascript:void(0)" sta="0" gid="{{$v->gid}}" class="col fr pc-search-c">收藏</a>
                                    @else
                                        <a href="javascript:void(0)" sta="1" gid="{{$v->gid}}" class="col fr pc-search-c">已收藏</a>
                                    @endif
                                @else
                                    <a href="javascript:void(0)" sta="0" gid="{{$v->gid}}" class="col fr pc-search-c">收藏</a>
                                @endif

                    </p>
                </li>
                @endforeach
            </ul>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.col').click(function(){
                    var gid = $(this).attr('gid');
                    var cola = $(this);
                    if (cola.attr('sta')=='0') {
                        $.get('/home/colgood',{gid:gid},function(data){
                            if(data){
                                alert('成功收藏');
                                cola.text('已收藏');
                                cola.attr('sta','1');
                            } else {
                                alert('收藏失败,请重新尝试');
                            }
                        });
                    } else {
                        $.get('/home/delgood',{gid:gid},function(data){
                            if (data) {
                                if (data) {
                                    alert('成功取消收藏');
                                    cola.text('收藏');
                                    cola.attr('sta','0');
                                } else {
                                    alert('取消失败,请重新尝试');
                                }
                            }
                        });
                    }
                })
                $('#price-up').click(function(){
                    $('#order').val('desc');
                    $('#orform').submit();
                })
            </script>
            <div class="clearfix">
                <div class="fr pc-search-g">
                    <!-- <a class="fl pc-search-f" href="#">上一页</a> -->
                 <!--  <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

                <ul class="pagination">

                    <li class="disabled"><span>&laquo;</span></li>





                                                                        <li class="active"><span>1</span></li>
                                                                                <li><a href="http://stroe210.com/home/cate/30?page=2">2</a></li>
                                                                                <li><a href="http://stroe210.com/home/cate/30?page=3">3</a></li>
                                                                                <li><a href="http://stroe210.com/home/cate/30?page=4">4</a></li>
                                                                                <li><a href="http://stroe210.com/home/cate/30?page=5">5</a></li>


                    <li><a href="http://stroe210.com/home/cate/30?page=2" rel="next">&raquo;</a></li>
            </ul>


            </div> -->

                    <!-- <a title="使用方向键右键也可翻到下一页哦！" class="pc-search-n" href="javascript:;" onClick="SEARCH.page(3, true)">下一页</a> -->
                <!--     <span class="pc-search-y">
                        <em>  共20页    到第</em>
                        <input type="text" class="pc-search-j" placeholder="1">
                        <em>页</em>
                        <a href="#" class="confirm">确定</a>
                    </span> -->

                </div>
            </div>
        </div>
       <!--  <div class="pc-search-re clearfix">
            <dl>
                <dt>重新搜索</dt>
                <dd>
                    <input type="text" value="三星"  id="key-re-search" class="text">
                    <input type="button" value="搜&nbsp;索" id="btn-re-search" class="button">
                </dd>
            </dl>
        </div> -->
    </div>
</div>
@endsection
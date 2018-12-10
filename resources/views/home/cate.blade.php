@extends('layout.homes')


@section('title',$title)


@section('js')
    <style>

            .pagination li a{

                color: #fff;
            }

                .pagination li{
                    float: left;
                    height: 20px;
                    padding: 0 10px;
                    display: block;
                    font-size: 12px;
                    line-height: 20px;
                    text-align: center;
                    cursor: pointer;
                    outline: none;
                    background-color: #444444;

                    text-decoration: none;

                    border-right: 1px solid rgba(0, 0, 0, 0.5);
                    border-left: 1px solid rgba(255, 255, 255, 0.15);

                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                }

                .pagination  .active{
                        color: #323232;
                        border: none;
                        background-image: none;
                        background-color: #88a9eb;

                        box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                }

                .pagination .disabled{
                    color: #666666;
                    cursor: default;

                }

                .pagination{
                    margin:0px;
                }

            </style>

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

@section('content')
    <div class="containers"><div class="pc-nav-item"><a href="#">全部分类 </a> &gt; <a href="#">
        @foreach($cates as $k=>$v)
        {{$v->tname}}
        @endforeach
    </a></div></div>

<div class="containers clearfix">
    <div class="fl">
        <div  class="time-border-list pc-search-list clearfix">
             @foreach($goods as $k=>$v)
             @if($v->status == 0)
                <li>
                    <h2>新品推荐</h5><br>
                    <a href="/home/goods/{{$v->gid}}"> <img src="{{$v->gpic}}" style="width: 200px; height:300;"></a>
                    <p class="head-name"><a href="#">{{$v->gname}}</a> </p>
                    <p><span class="price">￥{{$v->price}}.00</span></p>
                    <p class="head-futi clearfix"><span class="fl">评论数:##</span> <span class="fr">100人购买</span></p>
                    <p class="clearfix"><span class="label-default fl">抢购</span> <a href="#" class="fr pc-search-c">收藏</a> </p>
                </li>
                <br>
            @endif
            @endforeach
        </div>
    </div>
    <div class="pc-info fr">
        <div class="pc-term">
            <dl class="pc-term-dl clearfix">
                <dt>颜色：</dt>
                @foreach($gimgs as $k=>$v)
                <dd><a href="#">{{$v->gcolor}}</a></dd>
                @endforeach
            </dl>
            <dl class="pc-term-dl clearfix">
                <dt>尺寸：</dt>
                @foreach($gimgs as $k=>$v)
                <dd><a href="#">{{$v->gsize}}</a></dd>
                @endforeach
            </dl>
            <div class="pc-line"></div>
            <div class="pc-search clearfix">
                <div class="fl pc-search-in">
                    <input type="text" class="pc-search-w">
                    <a href="#" class="pc-search-a">搜索</a>
                </div>
                <div class="fr pc-with">
                    相关搜索：
                    @foreach($goods as $k=>$v)
                     <a href="#">{{$v->gname}}</a><em>|</em>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="pc-term">
            <div class="clearfix pc-search-p">
                <div class="fl pc-search-e"><a href="#" class="cur">综合</a><a href="#" >销量</a><a href="#">价格</a><a href="#">评价</a></div>
               <!--  <div class="fr pc-search-v">
                    <ul>
                        <li><input type="checkbox"><a href="#">有货</a> </li>
                        <li><input type="checkbox"><a href="#">限时抢购</a> </li>
                        <li><input type="checkbox"><a href="#">满减大促</a> </li>
                    </ul>
                </div> -->
            </div>
           <!--  <div class="pc-search-i">
                <div class="fr">
                    <span class="pc-search-t"><b>1</b><em>/</em><i>32</i></span>
                    <a href="#" class="pc-search-d">上一页</a>
                    <a href="#">下一页</a>
                </div>
            </div> -->
        </div>
        <div class="time-border-list pc-search-list clearfix">
            <ul class="clearfix">
                @foreach($goods as $k=>$v)
                <li>
                    <a href="/home/goods/{{$v->gid}}"> <img src="{{$v->gpic}}" style="width: 200px; height:300;"></a>
                    <p class="head-name"><a href="#">{{$v->gname}}</a> </p>
                    <p><span class="price">￥{{$v->price}}.00</span></p>
                    <p class="head-futi clearfix"><span class="fl">评论数:##</span> <span class="fr">100人购买</span></p>
                    <p class="clearfix"><span class="label-default fl">抢购</span> <a href="#" class="fr pc-search-c">收藏</a> </p>
                </li>
                @endforeach
            </ul>
            <div class="clearfix">
                <div class="fr pc-search-g">
                    <!-- <a class="fl pc-search-f" href="#">上一页</a> -->
                 <!--  <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

                {{$res->appends($request->all())->links()}}

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

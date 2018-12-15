@extends('layout.mymsg')
@section('title',$title)
@section('style','style=height:36px')
@section('content')
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <script src="/bs/js/bootstrap.min.js"></script>
    <div class="containers"><div class="pc-nav-item"><a href="#" class="pc-title">首页</a> > <a href="javascript:void(0)">{{$stroe->company}}</a><!--  > <a href="#">即将开始</a> --> </div></div>
    <div class="containers"><div class="pc-add-item"><img width="1200" height="315" src="{{$stroe->image}}"></div></div>
    <div class="pc-buying clearfix">
        <div class="time-list time-list-w fl">
        <div class="time-title time-clear">
            <h2>&nbsp;</h2>
            <div class="time-item fl clearfix">

            </div><!--倒计时模块-->
            @php
            $res = DB::table('collect')->where('uid',session('userinfo')['uid'])->where('sid',$stroe->id)->first();
            @endphp
            @if(!count($res))
            <a class="fc-primary" href="/home/collect/{{$stroe->id}}"> 收藏店铺>>   </a>
            @else
            <a href="javascript:void(0)">店铺已收藏 >></a>
            @endif
        </div>
        <div class="time-border time-border-h time-border-list clearfix">
            <ul>
                @foreach($goods as $v)
                <li>
                    <a href="/home/goods/{{$v->gid}}"> <img width="250" height="250" src="{{$v->gpic}}"></a>
                    <p class="head-name"><a href="/home/goods/{{$v->gid}}">{{$v->gname}}</a> </p>
                    <p><span class="price">￥{{$v->price}}</span><br><span class="">{{date('Y年m月d日',strtotime($v->inputtime))}}上架</span></p>
                    <p class="head-futi"><spn>好评度：90% </spn> <span>（100人评价）</span></p>
                    <p class="label-default">暂无折扣</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
@endsection
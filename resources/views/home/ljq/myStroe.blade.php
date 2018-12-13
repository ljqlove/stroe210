@extends('layout.mymsg')
@section('title',$title)

@section('content')
    <div class="containers"><div class="pc-nav-item"><a href="#" class="pc-title">首页</a> > <a href="javascript:void(0)">我的店铺</a><!--  > <a href="#">即将开始</a> --> </div></div>
    <div class="containers">
        <div class="time-border time-border-h time-border-list clearfix">
            <ul>
                @foreach($myStroe as $v)
                <li>
                    <a href="/home/myStroeInfo/{{$v->id}}"> <img width="250" src="{{$v->image}}"></a>
                    <p class="head-name"><a href="/home/myStroeInfo/{{$v->id}}">{{$v->company}}</a> </p>
                    <p><span class="price">掌柜 :</span><span class="price">{{$v->uname}}</span></p>
                    <p class=""><spn>好评度：90% </spn> <span>（100人评价）</span></p>
                    <p class="head-futi">{{ceil((time()-strtotime($v->create_at))/(3600*24*30*12)) }} 年老店</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

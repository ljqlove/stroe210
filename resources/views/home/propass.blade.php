@extends('layout.homes')


@section('title',$title)

@section('js')
    <link rel="shortcut icon" type="image/x-icon" href="/homes/theme/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/member.css">
    <script type="text/javascript" src="/homes/theme/js/jquery.js"></script>


    <link href="/errors/toastr.css" rel="stylesheet" type="text/css" />
    <script src='https://cdn.bootcss.com/jquery/3.3.1/jquery.js'></script>
    <script src="/errors/toastr.js"></script>


    <script type="text/javascript" async="" src="https://wlssl.jd.com/wl.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Expires-Type" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/jdf/1.0.0/unit/??ui-base/5.0.0/ui-base.css,shortcut/5.0.0/shortcut.css,global-header/1.0.0/global-header.css,myjd/5.0.0/myjd.css,nav/2.0.0/nav.css,shoppingcart/2.0.0/shoppingcart.css,global-footer/5.0.0/global-footer.css,service/5.0.0/service.css,basePatch/1.0.0/basePatch.css">
    <script type="text/javascript" src="//misc.360buyimg.com/jdf/1.0.0/unit/??base/5.0.0/base.js,basePatch/1.0.0/basePatch.js"></script>
    <link rel="stylesheet" type="text/css" href="//misc.360buyimg.com/user/myjd-2015/css/myjd.info.css" media="all">
    <link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/user/myjd-2015/widget/??common/common.css" source="widget">
    <script type="text/javascript" src="//misc.360buyimg.com/jdf/??lib/jquery-1.6.4.js,1.0.0/unit/libPath/1.0.0/libPath.js"></script>
    <script type="text/javascript" async="" src="//nfa.jd.com/loadFa.js?aid=2_959_6296-2_959_6297"></script>
@endsection

@php
	$message = \DB::table('message')->where('uid',(session('userinfo')['uid']))->first();
    $user = DB::table('users')->where('uid',session('userinfo')['uid'])->first();
@endphp


@section('content')
<!-- 账户安全模块 begin-->
<section id="member">
    <div class="member-center clearfix">

       <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl"><a href="#"><img src="{{$message->headpic}}" width="80px" height="80px"></a></div>
                <div class="fl">
                    <p>用户名：</p>
                    <p><a href="#">&nbsp;&nbsp;{{$message->uname}}</a></p>
                    <p>昵称：</p>
                    <p>&nbsp;&nbsp;{{$message->mname}}</p>
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd class="cur"><a href="/home/wjd/message">我的信息</a></dd>
                    <dd class="cur"><a href="#">我的订单</a></dd>
                    <dd><a href="#">我的收藏</a></dd>
                    <dd><a href="/home/security/{{$message->uid}}">账户安全</a></dd>
                    <dd><a href="#">我的评价</a></dd>
                    <dd><a href="/home/wjd/address">地址管理</a></dd>
                </dl>
            </div>
        </div>

        <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>添加密保问题</h2></div>
            </div>
            <div class="member-border">
                     <div class="form">
                        @php
                            $res = DB::table('propass')->where('uid',$id)->get();
                        @endphp
                            @if(is_null($res))
                            <form action="/home/uppropass" method="post">
                            @else
                            <form action="/home/set_propass" method="post">
                            @endif
                                <div class="item">
                                    <span class="label">密保问题:</span>
                                        <input clstag="homepage|keycount|home2013|infoname" type="text" class="itxt" maxlength="20" name="ptitle">
                                </div>
                                
                                <div class="item">
                                    <span class="label"><em>*</em>答案：</span>
                                    <div class="fl">
                                        <input clstag="homepage|keycount|home2013|infoname" type="text" class="itxt" maxlength="20" name="pcontent" >
                                        <input clstag="homepage|keycount|home2013|infoname" type="hidden" class="itxt" maxlength="20" name="id" value="{{$id}}">
                                        <div class="clr"></div><div class="prompt-06"><span id="nickName_msg"></span></div>
                                    </div>
                                </div>
                            
                            <div class="item">
                                    <span class="label">&nbsp;</span>
                                    <div class="fl">

                                        <button type="submit">提交</button>
                                    </div>
                                </div>
                                {{csrf_field()}}
                          </form>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- 账户安全模块 End-->
@endsection
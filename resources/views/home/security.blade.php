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
                <div class="member-heels fl"><h2>账户安全</h2></div>
            </div>
            <div class="member-border">
               <div class="member-secure clearfix">
                   <div class="member-extent fl">
                       <h2 class="fl">安全级别</h2>
                       <ul class="fl">
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on"></li>
                           <li class="on1"><a href="#"></a></li>
                           <li class="on2"><a href="#"></a></li>
                           <li class="on3"><a href="#"></a></li>
                       </ul>
                       <span class="fl">较高</span>
                   </div>
                   <div class="fr reds"><p> * 建议您开启全部安全设置，以保障您的账户及资金安全</p></div>
               </div>
               <div class="member-caution clearfix">
                   <ul>
                       <li class="clearfix">
                           <div class="warn1"></div>
                           <div class="warn2">登录密码</div>
                           <div class="warn3">互联网账号存在被盗风险，建议您定期更改密码以保护账户安全。</div>
                           <div class="warn4"><a href="/home/security/pw/{{$user->uid}}">修改</a> </div>
                       </li>
                       <li class="clearfix">
                           <div class="warn1"></div>
                           <div class="warn2">密保问题</div>
                           <div class="warn3">建议您设置密保问题。  </div>
                           <div class="warn4"><a href="/home/propass/{{$user->uid}}">设置密保</a> </div>
                       </li>
                       <li class="clearfix">
                           <div class="warn1"></div>
                           <div class="warn2">手机验证</div>
                           <div class="warn3">您验证的手机： <i class="reds">{{$user->phone}}</i>   若已丢失或停用，请立即更换，<i class="reds">避免账户被盗</i></div>
                           <div class="warn5"><p>解绑请咨询官方客服&nbsp;&nbsp;&nbsp;<br>电话: <i>1008611 </i></p></div>
                       </li>
                       <!-- <li class="clearfix">
                           <div class="warn6"></div>
                           <div class="warn2">支付密码</div>
                           <div class="warn3">安全程度：  建议您设置更高强度的密码。</div>
                           <div class="warn5"><a href="#">支付密码管理</a></div>
                       </li> -->
                   </ul>
                   <div class="member-prompt">
                       <p>安全提示：</p>
                       <p>您当前IP地址是：<i class="reds">110.106.0.01</i>  北京市          上次登录的TP： 2015-09-16  <i class="reds">110.106.0.02 </i> 天津市</p>
                       <p>1. 注意防范进入钓鱼网站，不要轻信各种即时通讯工具发送的商品或支付链接，谨防网购诈骗。</p>
                       <p>2. 建议您安装杀毒软件，并定期更新操作系统等软件补丁，确保账户及交易安全。      </p>
                   </div>
               </div>
            </div>
        </div>
    </div>
</section>
<!-- 账户安全模块 End-->
@endsection
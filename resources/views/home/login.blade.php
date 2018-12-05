<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <title>{{$title}}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/css/iconfont/iconfont.css" rel="stylesheet"/>
    <link href="/css/common.css" rel="stylesheet"/>
    <link href="/css/login.css" rel="stylesheet"/>
</head>
<body>
<!--头部-->
    <div class="login-header">
        <div class="wrapper">
            <a href="" class="logo">
                <img src="/images/logo.png" alt="" />
            </a>
            <div class="zp">
                <span class="ico"></span>
                <div>正品保障</div>
            </div>
        </div>
    </div>
    <div class="login-main-wrap">
        <div class="login-main wrapper">
            <div class="login-box">
                <form action="/home/dologin" method="get">
                    <div class="box-hd">
                        <span class="tit">用户登录</span>
                        <a href="/home/register">注册新账号</a>
                    </div>
                    <label class="txtin-box">
                        <span class="ico user"></span>
                        <input class="txtin" type="text" name="phone" placeholder="用户名/手机" />
                    </label>
                    <label class="txtin-box">
                        <span class="ico pwd"></span>
                        <input class="txtin" type="password" name="password" placeholder="密码" />
                    </label>
                     {{csrf_field()}}
                    <input class="tj" type="submit" value="登&ensp;录" />
                    <div class="other-way clearfix">
                        <a class="item first" href="">
                            <img src="/img/login/weixin.jpg" alt="" class="ico" />
                            <span class="label">微信</span>
                        </a>
                        <a class="item" href="">
                            <img src="/img/login/qq.jpg" alt="" class="ico" />
                            <span class="label">QQ</span>
                        </a>
                        <a class="item" href="">
                            <img src="/img/login/sina.jpg" alt="" class="ico" />
                            <span class="label">新浪微博</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="login-footer">
        XXX网络科技有限公司 版权所有 Copyright © 2016-2018   备案号：皖ICP备123456789
        <div class="authentication">
            <a href=""><img src="/uploads/35.jpg" alt="" /></a>
            <a href=""><img src="/uploads/36.jpg" alt="" /></a>
            <a href=""><img src="/uploads/37.jpg" alt="" /></a>
            <a href=""><img src="/uploads/38.jpg" alt="" /></a>
        </div>
    </div>
</body>
<script src="/js/jquery.js"></script>
<link rel="stylesheet" href="/js/icheck/style.css"/>
<script src="/js/icheck/icheck.min.js"></script>
<script src="/js/global.js"></script>
<script>
    $('.check input').iCheck({
            checkboxClass: 'sty1-checkbox'
        });
</script>
</html>
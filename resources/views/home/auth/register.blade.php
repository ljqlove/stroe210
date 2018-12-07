<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta name="renderer" content="webkit">
    <title>用户注册</title>
    <link rel="shortcut icon" type="image/x-icon" href="/homes/theme/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/login.css">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/home.css">
    <script type="text/javascript" src="/homes/theme/js/jquery.js"></script>
    <script type="text/javascript" src="/homes/theme/js/js-tab.js"></script>
    <link rel="stylesheet" href="/font/css/font-awesome.min.css">
    <style>
        .content{
            padding:80px 150px;
        }
        .info{
            margin-left:270px;
            display: none;
        }
        .success{
            color:green;
        }
        .error{
            color:#e53e41;
        }
        .i-code{
            display: none;
        }
        .alert{

        }

        /*灰色遮罩层*/
        .fade{
            width:100%;
            height:100%;
            background:rgba(0, 0, 0, 0.5);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 99;
        }
        /*弹出层*/
        .succ-pop{
            width: 400px;
            height: 300px;
            background: #fff;
            position: fixed;
            left: 50%;
            top: 50%;
            margin-left: -200px;
            margin-top: -150px;
            z-index: 999;
            border-radius: 5px;
        }
        .succ-pop h3.title{
            text-align: center;
            font-size: 22px;
            color: #ce002c;
            margin-top:80px;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
 </head>
 <body>

<!--- header begin-->
<header id="pc-header">
    <div class="login-header" style="padding-bottom:0; ">
        <div class="pc-order-title fl"><h1><a href="/"><img src="/homes/theme/icon/logo.png"></a></h1></div>
        <div style="clear:both"></div>
    </div>
</header>
<!-- header End -->



<section id="login-content">
    <div class="login-centre">
        <div class="login-switch clearfix">
            <p class="fr">我已经注册，现在就 <a href="/home/login">登录</a></p>
        </div>
        <div class="login-back">
            <div class="H-over">
                @if (count($errors) > 0)
                    <div class="fade"></div>
                    <div class="succ-pop">
                        <h3 class="title">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </h3>
                        <a id="button" style="border:1px solid red;display: block;width:200px;margin-top:120px;height:40px;border-radius:10px;margin-left:100px;text-align:center;line-height: 40px;font-size:18px;font-weight: bold;color:#fff;background:#e53e41" href="javascript:void(0)">关闭</a>
                    </div>
                @endif
                <form action="/home/doregister" method="post" name="form1">
                    <div class="login-input">
                        <label><i class="heart">*</i>手机号：</label>
                        <input type="text" class="list-input1" id="iphone" name="phone" placeholder="">
                        <span class="info i-iphone-error error">*请输入手机号</span>
                    </div>

                    <div class="login-input">
                        <label><i class="heart">*</i>密码(4-12位)：</label>
                        <input type="password" class="list-input" id="password" name="password" placeholder="">
                        <span class="info i-password-error error">*请输入您的密码</span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>重复密码：</label>
                        <input type="password" class="list-input" id="repassword" name="repassword" placeholder="">
                        <span class="info i-repassword-error error">*请输入您的密码</span>
                    </div>

                    <div class="login-input">
                        <label><i class="heart">*</i>验证码：</label>
                        <input type="text" class="list-notes" id="code" name="code" placeholder=""> <img style="margin-left:15px;cursor: pointer;" src="/admin/captcha" alt="这是验证码" onclick='this.src = this.src+="?1"'>

                    </div>
                    <div class="item-ifo">
                         <input type="checkbox" onClick="agreeonProtocol();" id="readme" checked="checked" class="checkbox">
                        <label for="protocol">我已阅读并同意<a id="protocol" class="blue" href="#">《悦商城用户协议》</a></label>
                    {{csrf_field()}}
                    </div>
                    <div class="login-button">
                        <a id="sub" href="javascript:document.form1.submit();">立即注册</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!--- footer begin-->
<footer id="footer">
    <div class="containers">
        <div class="w" style="padding-top:30px">
            <div id="footer-2013">
                <div class="links">
                    <a href="">关于我们</a>
                    |
                    <a href="">联系我们</a>
                    |
                    <a href="">人才招聘</a>
                    |
                    <a href="">商家入驻</a>
                    |
                    <a href="">广告服务</a>
                    |
                    <a href="">手机京东</a>
                    |
                    <a href="">友情链接</a>
                    |
                    <a href="">销售联盟</a>
                    |
                    <a href="">English site</a>
                </div>
                <div style="padding-left:10px">
                    <p style="padding-top:10px; padding-bottom:10px; color:#999">网络文化经营许可证：浙网文[2013]0268-027号| 增值电信业务经营许可证：浙B2-20080224-1</p>
                    <p style="padding-bottom:10px; color:#999">信息网络传播视听节目许可证：1109364号 | 互联网违法和不良信息举报电话:0571-81683755</p>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- footer End -->
    <script>
        $('#button').click(function(){
            $('.succ-pop').css('display','none');
            $('.fade').css('display','none');
        })

        var COM = true;
        var UNA = true;
        var PS = true;
        var PH = true;
        var CV = true;



        //店铺名
        //获取焦点事件
        $('#iphone').focus(function(){
            // $(this).css('border','solid 1px skyblue');
            $('.i-iphone-error').hide();
            $(this).addClass('cur');
        })
        //失去焦点事件
        $('#iphone').blur(function(){
            //获取输入的值
            var uv = $(this).val().trim();
            if(uv == ''){
                $('.i-iphone-error').show();

                $(this).css('border','solid 1px #e53e41');

                COM = false;

                return;
            }

        })

        //密码
        //获取焦点事件
        $('#password').focus(function(){
            // $(this).css('border','solid 1px skyblue');
            $('.i-password-error').hide();
            $('.i-password-success').hide();
            $(this).addClass('cur');
        })
        //失去焦点事件
        $('#password').blur(function(){
            //获取输入的值
            var uv = $(this).val().trim();
            if(uv == ''){
                $('.i-password-error').show();

                $(this).css('border','solid 1px #e53e41');

                COM = false;

                return;
            } else {
                $(this).css('border','1px solid green');
            }

        })

        //密码
        //获取焦点事件
        $('#repassword').focus(function(){
            // $(this).css('border','solid 1px skyblue');
            $('.i-repassword-error').hide();
            $('.i-repassword-success').hide();
            $(this).addClass('cur');
        })
        //失去焦点事件
        $('#repassword').blur(function(){
            //获取输入的值
            var uv = $(this).val().trim();
            if(uv == ''){
                $('.i-repassword-error').show();

                $(this).css('border','solid 1px #e53e41');

                PS = false;

                return;
            } else {
                $(this).css('border','1px solid green');
            }

        })


        //手机号
        //获取焦点事件
        $('#iphone').focus(function(){
            // $(this).css('border','solid 1px skyblue');
            $('.i-iphone-error').hide();
            $('.iphone-success').hide();
            $(this).addClass('cur');
        })
        //失去焦点事件
        $('#iphone').blur(function(){
            //获取输入的值
            var uv = $(this).val().trim();
            if(uv == ''){
                $('.i-iphone-error').show();

                $(this).css('border','solid 1px #e53e41');

                PH = false;

                return;
            } else {
                $(this).css('border','1px solid green');
            }

        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        //获取验证码
        $('#code').focus(function(){
            $('.i-code-error').hide();
            $('.i-code-success').hide();
            $(this).addClass('cur');
        })

        $('#code').blur(function(){
            ///获取验证码
            var cd = $(this).val().trim();

            if(cd == ''){
                $('i-code-error').show();
                $(this).css('border','solid 1px #e53e41');

                CV = false;
                return;
            } else {
                $(this).css('border','1px solid green');
            }


        })
    </script>
</body>
</html>



<!--- header begin-->
<header id="pc-header">
    <div class="login-header" style="padding-bottom:0">
        <div><h1><a href="index.html"><img src="/theme/icon/logo.png"></a></h1></div>
    </div>
</header>
<!-- header End -->



<section id="login-content">
    <div class="login-centre">
        <div class="login-switch clearfix">
            <p class="fr">我已经注册，现在就 <a href="/home/login">登录</a></p>
        </div>
        <div class="login-back">
            <div class="H-over">
                <form action="/home/doregiste" method="post">
                @if (count($errors) > 0)
                  <div class="btn btn-block btn-lg btn-gradient-primary mt-4" id="xserror">
                          <p>显示错误信息</p>
                            <ul  style="list-style:none;">
                              @foreach ($errors->all() as $error)
                              <li style='font-size:20px;'>{{$error}}</li>
                              @endforeach
                            </ul>
                        </div>
                  @endif
                    <div class="login-input">
                        <label><i class="heart">*</i>手机号：</label>
                        <input type="text" class="list-input" id="phone" name="phone" placeholder="">
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请设置密码：</label>
                        <input type="password" class="list-input" id="password" name="password" placeholder="">
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请确认密码：</label>
                        <input type="password" class="list-input" id="repass" name="repass" placeholder="">
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>验证码：</label>
                        <input type="text" class="list-notes" name="captcha" placeholder=""><img class="pull-right" src="/home/captcha" alt="" onclick='this.src=this.src+="?1"'>
                    </div>
                     {{csrf_field()}}
                     <input name="_method" type="hidden" value="PUT">
                    <div class="item-ifo">
                        <input type="checkbox" onClick="agreeonProtocol();" id="readme" checked="checked" class="checkbox">
                        <label for="protocol">我已阅读并同意<a id="protocol" class="blue" href="#">《悦商城用户协议》</a></label>
                        <span class="clr"></span>
                    </div>
                    <div class="login-button">
                        <button>点击注册</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!--- footer begin-->
<footer id="footer">
    <div class="containers">
        <div class="w" style="padding-top:30px">
            <div id="footer-2013">
                <div class="links">
                    <a href="">关于我们</a>
                    |
                    <a href="">联系我们</a>
                    |
                    <a href="">人才招聘</a>
                    |
                    <a href="">商家入驻</a>
                    |
                    <a href="">广告服务</a>
                    |
                    <a href="">手机京东</a>
                    |
                    <a href="">友情链接</a>
                    |
                    <a href="">销售联盟</a>
                    |
                    <a href="">English site</a>
                </div>
                <div style="padding-left:10px">
                    <p style="padding-top:10px; padding-bottom:10px; color:#999">网络文化经营许可证：浙网文[2013]0268-027号| 增值电信业务经营许可证：浙B2-20080224-1</p>
                    <p style="padding-bottom:10px; color:#999">信息网络传播视听节目许可证：1109364号 | 互联网违法和不良信息举报电话:0571-81683755</p>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- footer End -->
</body>
</html>
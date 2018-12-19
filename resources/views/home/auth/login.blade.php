
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
    <title>立即登录</title>
    <link rel="stylesheet" href="/homes/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/homes/theme/css/login.css">
    <script src="/homes/theme/js/jquery-3.1.1.min.js"></script>
    <script src="/homes/js/gt.js"></script>
    <style>
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
        #embed-captcha {
            width: 300px;
            margin: 0 auto;
        }
        .show {
            display: block;
        }
        .hide {
            display: none;
        }
        #notice {
            color: red;
        }
    </style>
</head>
<body>
<div class="w">
    <div id="logo">
        <a href="index.html">
            <img src="/homes/theme/icon/logo.png" alt="">
        </a>
        <b></b>
    </div>

    <a href="#" class="q_link fr">
        <b class="fl"></b>
        登录页面，改进意见
    </a>
</div>
<div id="content">
  <div class="login-wrap">
    @if($err=session('error'))
        <div class="fade"></div>
        <div class="succ-pop">
            <div >
                <ul>
                   <li style="font-weight: bold;font-size: 20px;text-align: center;padding:10px 80px;margin-top:80px">{{$err}}</li>
                </ul>
            </div>
            <a id="button" style="border:1px solid red;display: block;width:200px;margin-top:120px;height:40px;border-radius:10px;margin-left:100px;text-align:center;line-height: 40px;font-size:18px;font-weight: bold;color:#fff;background:#e53e41" href="javascript:void(0)">关闭</a>
        </div>
    @endif
    <div class="w">
        <div class="login-form">
            <div class="login-tab login-tab-r">
                <a href="/home/register">立即注册</a>
            </div>
            <div class="login-tab login-tab-l">
                <a href="javascript:;">账号登录</a>
            </div>
            <div class="login-box" style="visibility: visible; display:block">
              <div class="mt tab-h"></div>
              <div class="msg-wrap"></div>
              <div class="mc">
                <div class="form">
                    <form action="/home/dologin" name="form1" id="formlogin" method="put">
                        <div class="item item-fore1 item-error">
                            <label for="loginname" class="login-label name-label"></label>
                            <input type="text" name="phone" id="loginname" class="itxt" tabindex="1" autocomplete="off" placeholder="已验证手机号">
                            <span class="clear-btn" style="display:inline;"></span>
                        </div>
                        <!-- 密码输入框fore2 -->
                        <div id="entry" class="item item-fore2" style="visibility: visible">
                            <label class="login-label pwd-label" for="nloginpwd"></label>
                            <input type="password" name="password" id="nloginpwd" name="nloginpwd" class="itxt itxt-error" tabindex="2" autocomplete="off" placeholder="密码">
                            <span class="clear-btn" style="display: inline;"></span>
                            <span class="capslock" style="display: none;">
                                <b></b>
                                大小写锁定已打开
                            </span>
                        </div>
                        <div id="embed-captcha"></div>
                        <p id="wait" class="show">正在加载验证码......</p>
                        <p id="notice" class="hide">请先完成验证</p>
                        <!-- 图片验证码开始 fore3-->
                        <!-- <div id="o-authcode" class="item item-vcode item-fore3 hide ">
                            <input type="text" name="code" id="authcode" class="itxt itxt02" name="authcode" tabindex="3">
                            <img src="/home/captcha" alt="" onclick='this.src = this.src+="?1"'>
                        </div> -->
                        <!-- 自动登录开始fore4 -->
                        <div class="item item-fore4">
                            <div class="safe">
                                <span>
                                    <input type="checkbox" name="chkRememberMe" id="autologin" tabindex="3">
                                    <label for>记住密码</label>
                                </span>
                                <span class="forget-pw-safe">
                                    <a href="/home/dxyz">忘记密码</a>
                                </span>
                            </div>
                        </div>
                        {{csrf_field()}}
                        <!-- 登录按钮开始 -->
                        <div class="item item-fore5">
                            <div class="login-btn">
                                <a href="javascript:document.form1.submit();" class="btn-img btn-entry" id="loginsubmit" tabindex="6">登&nbsp;&nbsp;&nbsp;&nbsp;录</a>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            <div class="qrcode-login">
                <!-- <div class="mc">
                    <div class="qrcode-error-2016">
                        <div class="qrcode-error-mask"></div>
                        <p class="err-cont">服务器出错</p>
                        <a href="javascript:void(0)" class="refresh-btn">刷新</a>
                    </div>
                    <div class="qrcode-main">

                        <div class="qrcode-img" style="">
                            <img src="/homes/theme/login/code.png" alt="">
                            <div class="qrcode-error-02 hide" id="J-qrcodeerror" style="display: none;">
                                <a href="#none">
                                    <span class="error-icon"></span>
                                    <div class="txt">
                                       网络开小差咯
                                       <span class="ml10">刷新二维码</span>
                                     </div>
                                </a>
                            </div>
                        </div>

                        <div class="qrcode-help" style="display: none;"></div>
                    </div>

                    <div class="qrcode-panel">
                        <ul>
                            <li class="fore1">
                                <span>打开</span>
                                <a href="">
                                    <span class="red">手机歪秀购物 </span>
                                </a>
                            </li>
                            <li>扫一扫登录</li>
                        </ul>
                    </div>
                </div> -->
            </div>

            <div class="coagent" id="kbCoagent">
                <ul>
                    <li class="extra-r">
                       <div class="regist-link">
                        <a href="/home/register" class="">
                            <b></b>立即注册
                        </a>
                       </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-banner" style="background-color: #ea4949">
        <div class="w">
            <div id="banner-bg" class="i-inner" style="background: url(/homes/theme/login/a1.jpg);"></div>
        </div>
    </div>
  </div>
</div>
<div class="w">
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

</body>

<script type="text/javascript">
    var handlerEmbed = function (captchaObj) {
        $("#embed-submit").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
        captchaObj.appendTo("#embed-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        });
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };
    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "/home/logcaptcha?t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            console.log(data);
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                new_captcha: data.new_captcha,
                product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
            }, handlerEmbed);
        }
    });

    //alert($)
    $('#button').click(function(){
        $('.succ-pop').css('display','none');
        $('.fade').css('display','none');
    })
    $(".login-tab-l").click(function(){
        $(".login-box").css({"display":"block","visibility":"visible"});
        $(".qrcode-login").css({"display":"none"})
    });
    $(".login-tab-r").click(function(){
        $(".login-box").css({"display":"none"});
        // $(".qrcode-login").css({"display":"block","visibility":"visible"})
    });
    //点击微信图片显示帮助
    /*$(".qrcode-img").hover(function(){
        $(".qrcode-img").css({"left": "0"});
        $(".qrcode-help").css({"display":"block"});
    },function(){
        $(".qrcode-img").css({"left": "64px"});
        $(".qrcode-help").css({"display":"none"});
    });*/
    //确认输入用户名密码后，显示验证码
    $("#nloginpwd").blur(function(){
        if(($("#loginname").val() !="" )&&($("#nloginpwd").val() !="")){
        $("#o-authcode").css({"display":"block"});
    }
    })
    // createCode();

</script>
</html>
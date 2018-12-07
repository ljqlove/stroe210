
<!doctype html>
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
    <style>
        .content{
            padding:100px 150px;
        }
        .login-centre{
            margin-top:80px;
        }
        #msg{
            font-size:30px;
            font-family: '楷体';
            font-weight: bold;
            padding:80px 150px;
        }
        .bb{
            display: none;
        }
    </style>
 </head>
 <body>

<!--- header begin-->
<header id="pc-header">
    <div class="login-header" style="padding-bottom:0; ">
        <div class="pc-order-title fl"><h1><a href="/"><img src="/homes/theme/icon/logo.png"></a></h1></div>
        <div class="pc-step-title fr">
            <ul>
                <li class="cur2"><a href="/home/Merchant">1 . 商户入驻协议书</a></li>
                <li class="cur2"><a href="/home/Merchant_2">2 . 填写入驻信息</a></li>
                <li class="cur"><a href="/home/Merchant_3">3 . 等待审核</a></li>
            </ul>
        </div>
        <div style="clear:both"></div>
    </div>


</header>
<!-- header End -->



<section id="login-content">
    <div class="login-centre">
        <div class="info" style="text-align:center;margin-top:50px;color:green;font-size:24px;font-family: '楷体';">
            <span>您的申请成功提交</span>
        </div>
        <div class="login-back">
            <div class="H-over">
                <div id="msg">
                    <span>您的申请已经提交,请耐心等待
                        <b class="bb b1">•</b>
                        <b class="bb b2">•</b>
                        <b class="bb b3">•</b>
                        <b class="bb b4">•</b>
                        <b class="bb b5">•</b>
                        <b class="bb b6">•</b>
                    </span>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.info').fadeOut(2000);
    var i = 0;
    setInterval(function(){

        i++;
        if (i%7 == 1) {
            $('.b1').show();
        } else if(i%7 == 2) {
            $('.b2').show();
        } else if(i%7 == 3) {
            $('.b3').show();
        } else if(i%7 == 4) {
            $('.b4').show();
        } else if(i%7 == 5) {
            $('.b5').show();
        } else if(i%7 == 6) {
            $('.b6').show();
        } else {
            $('.bb').hide();
        }
    },500)
</script>
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
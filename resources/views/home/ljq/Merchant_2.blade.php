
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
    <link rel="stylesheet" href="/font/css/font-awesome.min.css">
    <style>
         .content{
            padding:80px 150px;
        }
        .login-centre{
            margin-top:80px;
        }
        .info{
            margin-left:270px;
            display: none;
        }
        .success{
            color:green;
        }
        .error{
            color:red;
        }
        .i-code{
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
                <li class="cur2"><a href="#">1 . 商户入驻协议书</a></li>
                <li class="cur"><a href="#">2 . 填写入驻信息</a></li>
                <li class=""><a href="#">3 . 等待审核</a></li>
            </ul>
        </div>
        <div style="clear:both"></div>
    </div>


</header>
<!-- header End -->



<section id="login-content">
    <div class="login-centre">
        <div class="login-back">
            <div class="H-over">
                <form action="/home/Merchant_3" method="post">
                    <div class="login-input">
                        <label><i class="heart">*</i>店铺名：</label>
                        <input type="text" class="list-input1" id="company" name="company" placeholder="">
                        <span class="info i-company error"></span>
                        <span class="info i-company success"></span>
                    </div>

                    <div class="login-input">
                        <label><i class="heart">*</i>请填写您的真实姓名：</label>
                        <input type="text" class="list-input" id="uname" name="uname" placeholder="">
                        <span class="info i-uname error"></span>
                        <span class="info i-uname success"></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请输入您的密码：</label>
                        <input type="text" class="list-input" id="password" name="password" placeholder="">
                        <span class="info i-password error"></span>
                        <span class="info i-password success"></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>手机号：</label>
                        <input type="text" class="list-iphone" id="iphone" name="iphone" placeholder="">
                        <a href="#" class="obtain">获取短信验证码</a>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>短信验证码：</label>
                        <input type="text" class="list-notes" id="message" name="info[password]" placeholder="">
                        <span class="i-code error">123</span>
                        <span class="i-code success">123</span>
                    </div>
                    <div class="item-ifo">

                    </div>
                    <div class="login-button">
                        <a href="#">立即申请</a>

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
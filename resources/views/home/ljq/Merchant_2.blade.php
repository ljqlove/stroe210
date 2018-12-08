
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
        <div class="pc-step-title fr">
            <ul>
                <li class="cur2"><a href="/home/Merchant">1 . 商户入驻协议书</a></li>
                <li class="cur"><a href="/home/Merchant_2">2 . 填写入驻信息</a></li>
                <li class=""><a href="javascript:void(0)">3 . 等待审核</a></li>
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
                @if (count($errors) > 0 || !empty($res = session('error')))
                    <div class="fade"></div>
                    <div class="succ-pop">
                        <h3 class="title">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <li>{{$res}}</li>
                            </ul>
                        </h3>
                        <a id="button" style="border:1px solid red;display: block;width:200px;margin-top:120px;height:40px;border-radius:10px;margin-left:100px;text-align:center;line-height: 40px;font-size:18px;font-weight: bold;color:#fff;background:#e53e41" href="javascript:void(0)">关闭</a>
                    </div>
                @endif
                <form action="/home/Merchant_3" method="post" name="form1">
                    <div class="login-input">
                        <label><i class="heart">*</i>店铺名：</label>
                        <input type="text" class="list-input1" id="company" name="company" placeholder="">
                        <span class="info i-company-error error">*请输入店铺名</span>
                        <span class="info i-company-success success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                    </div>

                    <div class="login-input">
                        <label><i class="heart">*</i>请填写您的真实姓名(2-8个汉字)：</label>
                        <input type="text" class="list-input" id="uname" name="uname" placeholder="">
                        <span class="info i-uname-error error">*请输入您的姓名</span>
                        <span class="info i-uname-success success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请输入您的密码(4-12位)：</label>
                        <input type="password" class="list-input" id="password" name="password" placeholder="">
                        <span class="info i-password-error error">*请输入您的密码</span>
                        <span class="info i-password-success success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>手机号：</label>
                        <input type="text" class="list-iphone" id="iphone" name="iphone" placeholder="">
                        <a href="javascript:void(0)" class="obtain">获取短信验证码</a>
                        <span class="info i-iphone-error error">*请输入正确的手机号
                        <span class="info iphone-success success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>短信验证码：</label>
                        <input type="text" class="list-notes" id="code" name="code" placeholder="">
                        <span class="i-code i-code-error error">请输入验证码</span>
                        <span class="i-code i-code-success success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                    </div>
                    <div class="item-ifo">
                    {{csrf_field()}}
                    </div>
                    <div class="login-button">
                        <a id="sub" href="javascript:document.form1.submit();">立即申请</a>

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
        $('#company').focus(function(){
            // $(this).css('border','solid 1px skyblue');
            $('.i-company-error').hide();
            $('.i-company-success').hide();
            $(this).addClass('cur');
        })
        //失去焦点事件
        $('#company').blur(function(){
            //获取输入的值
            var uv = $(this).val().trim();
            if(uv == ''){
                $('.i-company-error').show();

                $(this).css('border','solid 1px #e53e41');

                COM = false;

                return;
            }

            //正则
            var reg = /^\S{4,32}$/;
            var tu = $(this);
            //检测
            if(!reg.test(uv)){
                $('.i-company-error').show();
                $('.i-company-error').text(' *店铺名格式不正确').css('color','#e53e41');

                $(this).css('border','solid 1px #e53e41');

                COM = false;
            } else {

                    $('.i-company-success').show();

                    $(this).css('border','solid 1px green');

                    COM = true;
                }
        })

        //用户名
        //获取焦点事件
        $('#uname').focus(function(){
            // $(this).css('border','solid 1px skyblue');
            $('.i-uname-error').hide();
            $('.i-uname-success').hide();
            $(this).addClass('cur');
        })
        //失去焦点事件
        $('#uname').blur(function(){
            //获取输入的值
            var uv = $(this).val().trim();
            if(uv == ''){
                $('.i-uname-error').show();

                $(this).css('border','solid 1px #e53e41');

                COM = false;

                return;
            }

            //正则
            var reg =  /^[\u4e00-\u9fa5]{2,8}$/;
            var tu = $(this);
            //检测
            if(!reg.test(uv)){
                $('.i-uname-error').show();
                $('.i-uname-error').text(' *您的姓名格式不正确').css('color','#e53e41');

                $(this).css('border','solid 1px #e53e41');

                COM = false;
            } else {

                    $('.i-uname-success').show();

                    $(this).css('border','solid 1px green');

                    COM = true;
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

                PS = false;

                return;
            }

            //正则
            var reg = /^\S{4,12}$/;
            var tu = $(this);
            //检测
            if(!reg.test(uv)){
                $('.i-password-error').show();
                $('.i-password-error').text(' *您的密码格式不正确').css('color','#e53e41');

                $(this).css('border','solid 1px #e53e41');

                PS = false;
            } else {

                $('.i-password-success').show();

                $(this).css('border','solid 1px green');

                PS = true;
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
            }

            //正则
            var reg = /^1[3456789]\d{9}$/;
            var tu = $(this);
            //检测
            if(!reg.test(uv)){
                $('.i-iphone-error').show();
                $('.i-iphone-error').text(' *您的手机号格式不正确').css('color','#e53e41');

                $(this).css('border','solid 1px #e53e41');

                PH = false;
            } else {

                $('.iphone-success').show();

                $(this).css('border','solid 1px green');

                PH = true;
            }
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //获取验证码
        $('.obtain').click(function(){
            //获取手机号
            $(this).attr('disabled','disabled');
            $(this).css('cursor','not-allowed');
            var i = 60;
            var obt = $(this);
            var num = setInterval(function(){
                i--;
                obt.text(i);
            },1000)
            setTimeout(function(){
                clearInterval(num);
                obt.text('获取短信验证码');
                obt.removeAttr('disabled');
                obt.css('cursor','pointer')
            },60000)
            var phone = $('#iphone').val().trim();
            // console.log(phone);
            //发送ajax
            $.post('/home/checkphone',{number:phone},function(data){

                console.log(data);
            })

        })


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
            }

            var cs = $(this);
            //发送ajax
            $.get('/home/checkcode',{code:cd},function(data){
                console.log(data);
                if(data == '0'){

                    $('.i-code-error').show();
                    $('.i-code-error').text(' *验证码不正确').css('color','#e53e41');

                    cs.css('border','solid 1px #e53e41');

                    CV = false;
                } else {

                    $('.i-code-success').show();

                    cs.css('border','solid 1px green');

                    CV = true;
                }
            })

        })


        //提交事件
        /*$(':submit').click(function(){

            alert(1234);

            return false;
        })*/

        $('#sub').submit(function(){

            $('#company').trigger('blur');
            $('#uname').trigger('blur');
            $('#password').trigger('blur');
            $('#iphone').trigger('blur');
            $('#code').trigger('blur');

            if(US && PS && RPS && PH && CV){

                return true;
            }
            //var flag = 1   var flag = 0
            return false;
        })
    </script>
</body>
</html>
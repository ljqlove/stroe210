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
     <script>
         $(function(){

             $("#H-table li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over").hide();
                         $(".H-over:eq(" + _index + ")").show();
                     }
                 })(i));
             });
             $("#H-table1 li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over1").hide();
                         $(".H-over1:eq(" + _index + ")").show();
                     }
                 })(i));
             });
         });
     </script>

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

@section('sousuo')
<div class="head-form fl">
            <form class="clearfix">
                <input type="text" class="search-text" accesskey="" id="key" autocomplete="off" placeholder="洗衣机">
                <button class="button" onclick="search('key');return false;">搜索</button>
            </form>
            <div class="words-text clearfix">
                <a href="#" class="red">1元秒爆</a>
                <a href="#">低至五折</a>
                <a href="#">农用物资</a>
                <a href="#">买一赠一</a>
                <a href="#">佳能相机</a>
                <a href="#">稻香村月饼</a>
                <a href="#">服装城</a>
            </div>
        </div>

@endsection

@section('content')
	@php
		$message = DB::table('message')->where('uid',session('uid'))->first();
	@endphp

<section id="member">
    <div class="member-center clearfix">
        <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl">
                    <img id="lula" src="{{$message->headpic}}" width="80px" height="80px">
                   
                </div>
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
            
        <!-- 信息修改 -->
        <div class="mod-main">
                  <div class="mt">
                      <ul class="extra-l">
                          <li class="fore-1"><a id="jb" class="curr" href="javascript:void(0);"onclick="dianji()" >基本信息</a></li>
                          <li class="fore-2"><a id="tx" class="" href="javascript:void(0)" onclick="pic(this )">头像照片</a></li>
                      </ul>
                  </div>
                    @php
                      $user = DB::table('users')->where('uid',session('uid'))->first();
                    @endphp

                    <div class="mc" id="ziliao">
                        <div class="user-set userset-lcol">
                            <div class="form">
                              <div class="item" id="aliasArea">
                                    <span class="label"><em>*</em>登录手机号：</span>
                                    <div class="fl" id="aliasBefore">
                                        <strong>{{$user->phone}}</strong>
                                        <span class="ftx03">&nbsp;&nbsp;用于登录，请牢记哦~</span>
                                    </div>                              
                                </div>
                                <div class="item">
                                    <span class="label">用户名：</span>
                                        <input clstag="homepage|keycount|home2013|infoname" type="text" class="itxt" maxlength="20" id="uName" name="userVo.nickName" value="{{$message->uname}}">
                                </div>
                                
                                <div class="item">
                                    <span class="label"><em>*</em>昵称：</span>
                                    <div class="fl">
                                        <input clstag="homepage|keycount|home2013|infoname" type="text" class="itxt" maxlength="20" id="mName" name="userVo.nickName" value="{{$message->mname}}">
                                        <div class="clr"></div><div class="prompt-06"><span id="nickName_msg"></span></div>
                                    </div>
                                </div>
                                <div class="item">
                                    <span class="label">性别：</span>
                                    <div class="fl" clstag="homepage|keycount|home2013|infoGender">
                                        <input   type="radio" name="sex" class="jdradio" value="m" @if($message->sex == 'm') checked @endif id="sex" ><label >男</label>
                                        <input   type="radio" name="sex" class="jdradio" value="w" @if($message->sex == 'w') checked @endif id="sex"><label >女</label>
                                        <input   type="radio" name="sex" class="jdradio" value="b" @if($message->sex == 'b') checked @endif id="sex" ><label >保密</label>
                                    </div>
                               </div>
                            <div class="item">
                                    <span class="label">&nbsp;</span>
                                    <div class="fl">

                                        <a data-id="{{$message->mid}}"clstag="homepage|keycount|home2013|infobtn" href="javascript:void(0)" class="btn-5" onclick="updateUserInfo(this)">提交</a>
                                    </div>
                                </div>
    
                    </div>
          
              </div>
            </div>
        <div id="touxiang" class="mc update-face-cont" style="display:none";">
          <div >
            <p>
                
            </p>
          </div>
                          <div class="update-lcol">
                             <form id="myForm" method="post"  enctype='multipart/form-data'>
                                <div class="mb10">
                                    <div id="messages" style="border:1px solid #DB9A9A;background-color:#FFE8E8;color:#CC0000;text-align: left;"></div>
                                    <input type="file" name="file" id="xdaTanFileImg" onchange="xmTanUploadImg(this)" accept="image/*"/>
                                    <input id="btnCancel" type="hidden" clstag="pageclick|keycount|201602251|5">
                                    <input type="hidden" name="image" class="file" value=""/>
                                    <!-- <input type="file" name="file" value="" id="choose" accept="image/gif, image/png, image/jpg, image/jpeg" /> -->
                                    
                                    <div class="ftx03">仅支持JPG、GIF、PNG、JPEG、BMP格式，文件小于4M</div>
                                </div>
                                <div class="img-b-cont img-cont ">
                                    <!--<div class="tip">编辑预览区</div>-->
                               
                                    <div class="img-b">
                                        <img id="xmTanImg" name="bigImage" alt="" width="150" height="150" src="{{$message->headpic}}">
                                    </div>
                                  {{csrf_field()}}
                               
                                </div>
                              </form>
                              <!-- <div class="smt"><h3>推荐头像</h3></div> -->
                              <div class="smc face-list">
   <!--                              <ul class="imgUl" clstag="homepage|keycount|home2013|infoshowtx2">
                                    <li value="1"><img src="/homes/defaultImgs/1.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="2"><img src="/homes/defaultImgs/2.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="3"><img src="/homes/defaultImgs/3.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="4" class="selected"><img src="/homes/defaultImgs/4.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="5"><img src="/homes/defaultImgs/5.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="6"><img src="/homes/defaultImgs/6.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="7"><img src="/homes/defaultImgs/7.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="8"><img src="/homes/defaultImgs/8.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="9"><img src="/homes/defaultImgs/9.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="10"><img src="/homes/defaultImgs/10.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="11"><img src="/homes/defaultImgs/11.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="12"><img src="/homes/defaultImgs/12.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="13"><img src="/homes/defaultImgs/13.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="14"><img src="/homes/defaultImgs/14.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="15"><img src="/homes/defaultImgs/15.jpg" alt="" width="50" height="50"><b></b></li>
                                    <li value="16"><img src="/homes/defaultImgs/16.jpg" alt="" width="50" height="50"><b></b></li>
                                </ul> -->
                                <div class="btns mt20">
                                    <a data-uid="{{$message->uid}}" clstag="homepage|keycount|home2013|infoshowbtn" href="javascript:void(0)" class="btn-5 mr10" onclick="uploadDefaultImg(this)">保存</a>
                                </div>
                            </div>

                          </div>
                          <div class="update-rcol">
                              <div class="smt"><h3>效果预览</h3></div>
                              <div class="smc">
                                  你上传的图片会自动生成2种尺寸，请注意小尺寸的头像是否清晰
                                  <div class="img-m-cont img-cont">
                                      <div class="img-s">
                                          <img id="midImage" name="midImage" width="100" height="100" src="{{$message->headpic}}">
                                      </div>
                                  </div>
                                  100*100像素
                                  <div class="img-s-cont img-cont">
                                      <div class="img-s">
                                          <img id="smaImage" name="smaImage" width="50" height="50" src="{{$message->headpic}}">
                                      </div>
                                  </div>
                                  50*50像素
                              </div>
                          </div>
                          <div class="clr"></div>
                      </div>
      </div>
                <!-- 显示成功或失败 -->
          <input id="online_box"  type="hidden" value=""></input>
  </div>

</section>


<script>
  function updateUserInfo(obj){
    // 获取mid
    var mid = $(obj).attr('data-id');
    var uName = $('#uName').val();
    if (uName == null || uName == undefined || uName == '') {
          $('#online_box').val(1);
          var element = document.getElementById("online_box").value;
          if (element == '1') {
            Command: toastr["warning"]("用户名错误", "提示")
            toastr.options = {
              "closeButton": true,
              "debug": true,
              "newestOnTop": true,
              "progressBar": true,
              "rtl": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": 300,
              "hideDuration": 1000,
              "timeOut": 2000,
              "extendedTimeOut": 1000,
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            setTimeout(function () {
                // alert('修改成功');
              window.location.reload();
            }, 2000);
            return false;
          }
    }
    var mName = $('#mName').val();
    if (mName == null || mName == undefined || mName == '') {
          $('#online_box').val(1);
          var element = document.getElementById("online_box").value;
          if (element == '1') {
            Command: toastr["warning"]("昵称错误", "提示")
            toastr.options = {
              "closeButton": true,
              "debug": true,
              "newestOnTop": true,
              "progressBar": true,
              "rtl": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": 300,
              "hideDuration": 1000,
              "timeOut": 2000,
              "extendedTimeOut": 1000,
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            setTimeout(function () {
                // alert('修改成功');
              window.location.reload();
            }, 2000);
            return false;
          }
    }
    var checked = $('input:radio:checked').val()
    // 加载ajax事件
      $.ajax({
          async: false,
          url: "/home/wjd/ajaxmessageEdit",
          data: {
              mid: mid,
              uName:uName,
              mName:mName,
              checked:checked,
              _token:'{{csrf_token()}}'
          },
          type: "POST",
          dataType: "json",
          success: function(data) {
            if(data.status == 1){
              $('#online_box').val(data.status);
                var element = document.getElementById("online_box").value;
                if (element == '1') {
                  Command: toastr["success"]("修改成功", "提示")
                  toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "rtl": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                }
                setTimeout(function () {
                  // alert('修改成功');
                window.location.reload();
              }, 2000);
            } else {
              $('#online_box').val(data.status);
              var element = document.getElementById("online_box").value;
              if (element == '2') {
                Command: toastr["warning"]("您并没有任何修改", "错误")
                  toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "rtl": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
              }
            }
            
          }
      });

  }

  function pic(obj){
    // 让个人基本资料先隐藏
    var ziliao = document.getElementById('ziliao');
    if (ziliao) {
      ziliao.style.display="none";
    }

    // 显示修改头像
    var touxiang = document.getElementById('touxiang');
    // 修改class
    var jb = document.getElementById('jb');
    jb.className="";
    var tx = document.getElementById('tx');
    tx.className="curr";
    if (touxiang) {
      touxiang.style.display="";
    }
  }


  function uploadDefaultImg(obj){
    var form = new FormData();
    form.append('file',$("input[name='file']")[0].files[0]);
    var tp = $('#xmTanImg').attr("src");
    var ltx = $('#smaImage').attr("src");
    if (tp == ltx) {
      $('#online_box').val(2);
        var element = document.getElementById("online_box").value;
        if (element == '2') {
          Command: toastr["warning"]("您没有做任何修改", "警告")
          toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": true,
            "progressBar": true,
            "rtl": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 2000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
        }
        return false;
      }

    var  _token = '{{csrf_token()}}';
    form.append('_token', _token);
    
    $.ajax({
            async: false,
            type: "POST",
            url: "/home/wjd/message/ajaxupdate",
            data: form,
            dataType:'json',       //返回的数据类型
            contentType: false,
            processData: false,
            success: function(data) {
              // console.log(data);
              if(data.status == 1){
                $('#online_box').val(data.status);
                // 映射头像
                $("#midImage").attr("src",data.mpic);
                $("#smaImage").attr("src",data.mpic);
                $("#lula").attr("src",data.mpic);
                var element = document.getElementById("online_box").value;
                if (element == '1') {
                  Command: toastr["success"]("修改成功", "提示")
                  toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "rtl": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                }

              } else {

                $('#online_box').val(data.status);
                var element = document.getElementById("online_box").value;
                if (element == '2') {
                  Command: toastr["error"]("上传格式或大小不符合", "错误")
                  toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "rtl": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                }
            }
          }
      });
  }

  function dianji(){
    var touxiang = document.getElementById('touxiang');
    if (touxiang) {
      touxiang.style.display="none";
    }

    // 显示修改头像
    var ziliao = document.getElementById('ziliao');
    if (ziliao) {
      ziliao.style.display="";
    }
    // 修改class
    var tx = document.getElementById('tx');
    tx.className="";
    var jb = document.getElementById('jb');
    jb.className="curr";
  }

</script>

<script type="text/javascript">            
            //判断浏览器是否支持FileReader接口
            if (typeof FileReader == 'undefined') {
                document.getElementById("xmTanDiv").InnerHTML = "<h1>当前浏览器不支持FileReader接口</h1>";
                //使选择控件不可操作
                document.getElementById("xdaTanFileImg").setAttribute("disabled", "disabled");
            }

            //选择图片，马上预览
            function xmTanUploadImg(obj) {
                var file = obj.files[0];
                
                console.log(obj);console.log(file);
                console.log("file.size = " + file.size);  //file.size 单位为byte

                var reader = new FileReader();

                //读取文件过程方法
                reader.onloadstart = function (e) {
                    // console.log("开始读取....");
                }
                reader.onprogress = function (e) {
                    // console.log("正在读取中....");
                }
                reader.onabort = function (e) {
                    console.log("中断读取....");
                }
                reader.onerror = function (e) {
                    console.log("读取异常....");
                }
                reader.onload = function (e) {
                    console.log("成功读取....");

                    var img = document.getElementById("xmTanImg");
                    img.src = e.target.result;
                    //或者 img.src = this.result;  //e.target == this
                }

                reader.readAsDataURL(file)
            }
</script>
@endsection
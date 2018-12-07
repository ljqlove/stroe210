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
            
        <!-- 信息修改 -->
        <div class="mod-main">
                  <div class="mt">
                      <ul class="extra-l">
                          <li class="fore-1"><a class="curr" href="javascript:void(0);" onclick="xinxi(this)" >基本信息</a></li>
                          <li class="fore-2"><a href="javascript:void(0)" onclick="pic(this )">头像照片</a></li>
                      </ul>
                  </div>
                    @php
                      $user = DB::table('users')->where('uid',session('uid'))->first();
                    @endphp

                    <div class="mc">
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
        <div class="mc update-face-cont" style="display:none";">
                          <div class="update-lcol">
                              <div class="mb10">
                                  <object id="SWFUpload_0" type="application/x-shockwave-flash" data="/commons/swfupload.swf?preventswfcaching=1543998134759" width="202" height="34" class="swfupload"><param name="wmode" value="transparent"><param name="movie" value="/commons/swfupload.swf?preventswfcaching=1543998134759"><param name="quality" value="high"><param name="menu" value="false"><param name="allowScriptAccess" value="always"><param name="flashvars" value="movieName=SWFUpload_0&amp;uploadURL=%2Fuser%2Fupload%2Fimage.action&amp;useQueryString=false&amp;requeueOnError=false&amp;httpSuccess=&amp;assumeSuccessTimeout=0&amp;params=flashuploadimg%3DD73B73D9E60FAE816192664D9C57C62BFAB6D81921E46B8CCFFAC1BD9887DA5968DA51A4629107EFF839994F325F0A4CFF50A6236E69D3D5289E95C4670E074E1805BD138D62F18CE320E9A6818CA4C0A5218F71C9B892A0762FC821D8B1E29E2D7524557200EED774EB96A8C97AB35BCB6FBA3250A63145772C94523FE186F2C54B1539624E3C15CC1D66A8E2688A660BC0B6EE6F32F15FE361AFDF388C396C&amp;filePostName=file&amp;fileTypes=*.jpg%3B*.gif%3B*.png%3B*.jpeg%3B*.bmp&amp;fileTypesDescription=img&amp;fileSizeLimit=4%20MB&amp;fileUploadLimit=0&amp;fileQueueLimit=0&amp;debugEnabled=false&amp;buttonImageURL=%2Fimages%2Fperfect_bg.jpg&amp;buttonWidth=202&amp;buttonHeight=34&amp;buttonText=&amp;buttonTextTopPadding=0&amp;buttonTextLeftPadding=0&amp;buttonTextStyle=color%3A%20%23000000%3B%20font-size%3A%2016pt%3B&amp;buttonAction=-100&amp;buttonDisabled=false&amp;buttonCursor=-1"></object>
                                  <img id="loading" class="float:left" src="/errors/loading.png" style="display:none">
                                  <div id="messages" style="border:1px solid #DB9A9A;background-color:#FFE8E8;color:#CC0000;text-align: left;"></div>
                                  <input id="btnCancel" type="hidden" clstag="pageclick|keycount|201602251|5">
                                  <div class="ftx03">仅支持JPG、GIF、PNG、JPEG、BMP格式，文件小于4M</div>
                              </div>
                              <div class="img-b-cont img-cont ">
                                  <!--<div class="tip">编辑预览区</div>-->
                                  <div class="img-b">
                                      <img id="bigImage" name="bigImage" alt="" width="150" height="150" src="//storage.360buyimg.com/i.imageUpload/6a645f3665386364356537663931616131353433393938313332313733_big.jpg">
                                  </div>
                              </div>

                          </div>
                          <div class="update-rcol">
                              <div class="smt"><h3>效果预览</h3></div>
                              <div class="smc">
                                  你上传的图片会自动生成2种尺寸，请注意小尺寸的头像是否清晰
                                  <div class="img-m-cont img-cont">
                                      <div class="img-s">
                                          <img id="midImage" name="midImage" src="//storage.360buyimg.com/i.imageUpload/6a645f3665386364356537663931616131353433393938313332313733_mid.jpg">
                                      </div>
                                  </div>
                                  100*100像素
                                  <div class="img-s-cont img-cont">
                                      <div class="img-s">
                                          <img id="smaImage" name="smaImage" src="//storage.360buyimg.com/i.imageUpload/6a645f3665386364356537663931616131353433393938313332313733_sma.jpg">
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
    var mName = $('#mName').val();
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
                Command: toastr["error"]("您并没有任何修改", "错误")
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

</script>
@endsection
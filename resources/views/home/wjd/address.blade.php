@extends('layout.mymsg')

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

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/jdf/1.0.0/unit/??ui-base/1.0.0/ui-base.css,shortcut/2.0.0/shortcut.css,global-header/1.0.0/global-header.css,myjd/2.0.0/myjd.css,nav/2.0.0/nav.css,shoppingcart/2.0.0/shoppingcart.css,global-footer/1.0.0/global-footer.css,service/1.0.0/service.css,basePatch/1.0.0/basePatch.css"> 
<link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/user/myjd-2015/css/myjd.easebuy.css" source="combo">
<link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/user/myjd-2015/widget/??common/common.css" source="widget">
@endsection



	@php
        

		$message = \DB::table('message')->where('uid',(session('userinfo')['uid']))->first();
	@endphp

@section('con')
		<!-- 地址开头 -->

			<div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>地址管理</h2></div>
            </div>
            	@php
					$addres = \DB::table('address')->where('uid',(session('userinfo')['uid']))->orderBy('status', 'desc')->get();
					$addresCount = \DB::table('address')->where('uid',(session('userinfo')['uid']))->count();
				@endphp

            <div class="member-border">
                <div class="member-newly"><b id="num" data-num="{{$addresCount}}" onclick="add(this);">新增收货地址</b>您已经创建了<i class="reds"></i> <span id="nums">{{$addresCount}}</span> 个收货地址了，最多可创建<i class="reds"> 4</i>个</div>
                <div class="member-sites">
                    <ul>

						@foreach($addres as $k =>$v)
                        <li class="clearfix">
                        	@if($v->status == '1')
                        		<div class="default fl"><a href="#">默认地址</a> </div>
                        	@else
                            <div class="default fl"></div>
                            @endif
                            <div class="user-info1 fl clearfix">
                                <div class="user-info">
                                    <span class="info1">收货人：</span>
                                    <span class="info2">{{$v->aname}}</span>
                                </div>
                                <div class="user-info">
                                    <span class="info1">地址：</span>
                                    <span class="info2">{{$v->address}}</span>
                                </div>
                                <div class="user-info">
                                    <span class="info1">手机：</span>
                                    <span class="info2">{{$v->aphone}}</span>
                                </div>
                                <div class="user-info">
                                    <span class="info1">邮政编号：</span>
                                    <span class="info2">{{$v->postcode}}</span>
                                </div>
                            </div>
                            <div class="pc-event">
                            @if($v->status == '0')
                                <!-- <a href="/home/wjd/dostatus?id={{$v->aid}}">设为默认地址</a> -->
                                <a data-mid="{{$v->aid}}" href="javascript:void(0)" onclick="mren(this)">设为默认地址</a>
                            @endif
                            @if($v->status == '1')
                                <a href="#"  class="pc-event-d">设为默认地址</a>
                            @endif
	                            <a data-id="{{$v->aid}}" href="javascript:;"onclick="show(this);return false;"   >编辑 </a>
                                <a data-did="{{$v->aid}}" href="javascript:;" onclick="deletes(this)">删除</a>
                            </div>
                        </li>
                       @endforeach
                    </ul>
                </div>
                <div class="member-pages clearfix">
                </div>
            </div>
        </div>
        <!-- 地址结尾 -->
    </div>	

<!-- 添加地址 -->
<div class="thickbox" id="add" style="visibility:hidden; left: 374.5px; top: 200px; width: 762px; height: 442px;" ><div class="thickwrap" style="width: 760px;"><div class="thicktitle" id="" style="width:740"><span>编辑收货地址</span></div><div class="thickcon" id="" style="width: 740px; height: 490px; padding-left: 10px; padding-right: 10px;"><div id="addressDiagDiv">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/jdf/1.0.0/unit/??ui-base/1.0.0/ui-base.css,shortcut/2.0.0/shortcut.css,global-header/1.0.0/global-header.css,myjd/2.0.0/myjd.css,nav/2.0.0/nav.css,shoppingcart/2.0.0/shoppingcart.css,global-footer/1.0.0/global-footer.css,service/1.0.0/service.css,basePatch/1.0.0/basePatch.css"> 
<link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/user/myjd-2015/css/myjd.easebuy.css" source="combo">
<link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/user/myjd-2015/widget/??common/common.css" source="widget">
<title>收货地址</title>




<div class="m" id="edit-cont">
	<div class="mc">
		<div class="form">
            <input id="is-recommend-area" value="true" style="display: none">
            <input id="ip-address-level1-whiteList" value="" style="display: none">
            <input id="autoMapping" value="0" style="display: none">
            <input id="edit-provinceId" value="1" style="display: none">
            <input id="edit-cityId" value="2901" style="display: none">
            <input id="edit-countyId" value="4135" style="display: none">
            <input id="edit-townId" value="0" style="display: none">
            <input id="ip-address-special-provinces" value="" style="display: none">
            <input id="ip-address-provinceJDCode" value="1" style="display: none">


			<div class="item">
				<span class="label"><em>*</em>收货人：</span>
				<div class="fl">
					<input id="aname" value="" type="text" class="text" >
					<span id="consigneeNameNote" class="error-msg hide"></span>
				</div>
				<div class="clr"></div>
			</div>	
			
			<div class="item">
				<span class="label"><em>*</em>详细地址：</span>
				<div class="fl">
					<span style="float: left;margin-right: 5px;line-height:32px;" id="areaName"></span>
					<input id="address" value="" type="text" class="text text1">
				</div>
				<span class="error-msg" id="consigneeAddressNote"></span>
				<div class="clr"></div>
			</div>
			<div class="item">
				<div class="fl">
					<span class="label"><em>*</em>手机号码：</span>
					<input id="aphone" value="" type="text" maxlength="11" class="text"  >
				</div>
				
				<div class="clr"></div>
			</div>
			<div class="item">
				<span class="label">邮政编号：</span>
				<div class="fl">
					<input id="postcode" value="" maxlength="50" type="text" class="text text1" >
					<span class="error-msg hide" id="emailNote"></span>
				</div>
				<div class="clr"></div>
			</div>
			

			<div class="btns">
				<!-- id="up"  data-aid=""  -->
				<a   href="javascript:;"  onclick="ajaxadd(this);" class="e-btn btn-9 save-btn">添加收货地址</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
			</div>
		</div>
	</div>

</div></div><a href="javascript:void(0);" id="buyao" onclick="wu()" class="thickclose" >×</a></div></div>



 <!-- 地址修改 -->
<div class="thickbox" id="update" style="visibility:hidden; left: 374.5px; top: 200px; width: 762px; height: 442px;" ><div class="thickwrap" style="width: 760px;"><div class="thicktitle" id="" style="width:740"><span>编辑收货地址</span></div><div class="thickcon" id="" style="width: 740px; height: 490px; padding-left: 10px; padding-right: 10px;"><div id="addressDiagDiv">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/jdf/1.0.0/unit/??ui-base/1.0.0/ui-base.css,shortcut/2.0.0/shortcut.css,global-header/1.0.0/global-header.css,myjd/2.0.0/myjd.css,nav/2.0.0/nav.css,shoppingcart/2.0.0/shoppingcart.css,global-footer/1.0.0/global-footer.css,service/1.0.0/service.css,basePatch/1.0.0/basePatch.css"> 
<link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/user/myjd-2015/css/myjd.easebuy.css" source="combo">
<link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/user/myjd-2015/widget/??common/common.css" source="widget">
<title>收货地址</title>




<div class="m" id="edit-cont">
	<div class="mc">
		<div class="form">
            <input id="is-recommend-area" value="true" style="display: none">
            <input id="ip-address-level1-whiteList" value="" style="display: none">
            <input id="autoMapping" value="0" style="display: none">
            <input id="edit-provinceId" value="1" style="display: none">
            <input id="edit-cityId" value="2901" style="display: none">
            <input id="edit-countyId" value="4135" style="display: none">
            <input id="edit-townId" value="0" style="display: none">
            <input id="ip-address-special-provinces" value="" style="display: none">
            <input id="ip-address-provinceJDCode" value="1" style="display: none">


			<div class="item">
				<span class="label"><em>*</em>收货人：</span>
				<div class="fl">
					<input id="consigneeName" value="" type="text" class="text" >
					<span id="consigneeNameNote" class="error-msg hide"></span>
				</div>
				<div class="clr"></div>
			</div>

			                <!-- 有推荐功能的地址菜单 -->
                
                <div class="item" id="recommendAdd" style="display: none;">
                    <div class="fl consignee-auto-tip">
                        <i class="arrow-up"></i>
                        <div id="recommendAddList">
                        </div>
                    </div>
                </div>
			
			
			<div class="item">
				<span class="label"><em>*</em>详细地址：</span>
				<div class="fl">
					<span style="float: left;margin-right: 5px;line-height:32px;" id="areaName"></span>
					<input id="consigneeAddress" value="" type="text" class="text text1">
				</div>
				<span class="error-msg" id="consigneeAddressNote"></span>
				<div class="clr"></div>
			</div>
			<div class="item">
				<div class="fl">
					<span class="label"><em>*</em>手机号码：</span>
					<input id="consigneeMobile" value="" type="text" maxlength="11" class="text"  >
				</div>
				
				<div class="clr"></div>
			</div>
			<div class="item">
				<span class="label">邮政编号：</span>
				<div class="fl">
					<input id="consigneeEmail" value="" maxlength="50" type="text" class="text text1" >
					<span class="error-msg hide" id="emailNote"></span>
				</div>
				<div class="clr"></div>
			</div>
			

			<div class="btns">
				<a id="up"  data-aid=""   href="javascript:;"  onclick="editAddress(this);" class="e-btn btn-9 save-btn">保存收货地址</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
			</div>
		</div>
	</div>

</div></div><a href="javascript:void(0);" id="xiao" onclick="xs()" class="thickclose" >×</a></div></div>
        	<!-- 显示成功或失败 -->
        	<input id="online_box"  type="hidden" value=""></input>


<script>

	// 实现删除效果
	function deletes(obj)
	{
		var did = $(obj).attr('data-did');

	    $.ajax({
	        async: false,
	        url: "/home/wjd/ajaxdeletes",
	        data: {
	            did:did,
	            _token:'{{csrf_token()}}'
	        },
	        type: "POST",
	        dataType: "json",
	        success: function(data) {
	        	if(data.status == 1){
	        		$('#online_box').val(data.status);
 					var element = document.getElementById("online_box").value;
 					if (element == '1') {
 						Command: toastr["success"]("删除成功", "提示")
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
	        		$(obj).parent().parent().remove();
	        		var num = $('#num').attr('data-num');
	        		num = num -1;
	        		$('#num').attr('data-num',num);
	        		$('#nums').text(num);
	        	} else {
	        		alert('删除失败');
	        	}
	          
	        }
	    });
	}
	// 显示添加
	function add(){
		var num = $('#num').attr('data-num');
		if(num >= 4){
			Command: toastr["warning"]("无法添加", "警告")
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
			return false;
		}
 		var res = document.getElementById('add');
 		if (res){
 			res.style.visibility="visible";
 		}
	}
	// 实现添加
	function ajaxadd(obj)
	{
		var aname = $('#aname').val();
		var address = $('#address').val();
		var aphone = $('#aphone').val();
		var postcode =$('#postcode').val();
		if(aname == '' || aname == null){
			alert('名字不可为空');
			return false;
		}
 		// 加载修改事件
	    $.ajax({
	        async: false,
	        url: "/home/wjd/ajaxadd",
	        data: {
	            aname:aname,
	            address:address,
	            aphone:aphone,
	            postcode:postcode,
	            _token:'{{csrf_token()}}'
	        },
	        type: "POST",
	        dataType: "json",
	        success: function(data) {
	        	if(data.status == 1){
	        		$('#online_box').val(data.status);

 					var element = document.getElementById("online_box").value;
 					if (element == '1') {
 						Command: toastr["success"]("添加成功", "提示")
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
			     		window.location.reload();
			        }, 2000);
	        	} else {
 					if (element == '2') {
						Command: toastr["error"]("添加失败", "错误")
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

	// 去除添加
	function wu(){
		var buyao = document.getElementById('buyao');
 		if(buyao){
 			var res = document.getElementById('add');
 			res.style.visibility="hidden";
 		}
	}

	// 显示并加载修改
 	function show(obj){
 		var res = document.getElementById('update');
 		if (res){
 			res.style.visibility="visible";
 		}
 		var aid = $(obj).attr('data-id');

 		// 加载修改事件
	    $.ajax({
	        async: false,
	        url: "/home/wjd/ajaxedit",
	        data: {
	            aid: aid,
	            _token:'{{csrf_token()}}'
	        },
	        type: "POST",
	        dataType: "json",
	        success: function(data) {
	        	if(data.status == 1){
	        		$('#consigneeName').val(data.list.aname);
	        		$('#consigneeAddress').val(data.list.address);
	        		$('#consigneeMobile').val(data.list.aphone);
	        		$('#consigneeEmail').val(data.list.postcode);
	        		$('#up').attr('data-aid',data.list.aid);
	        	} else {
	        		alert('数据获取失败');
	        	}
	          
	        }
	    });
 	}

 	//实现修改操作
 	function editAddress(obj){
 		var aid = $(obj).attr('data-aid');
 		var consigneeName = $('#consigneeName').val();
		var consigneeAddress = $('#consigneeAddress').val();
		var consigneeMobile = $('#consigneeMobile').val();
		var consigneeEmail =$('#consigneeEmail').val();
 		// 加载修改事件
	    $.ajax({
	        async: false,
	        url: "/home/wjd/ajaxupdate",
	        data: {
	            aid: aid,
	            consigneeName:consigneeName,
	            consigneeAddress:consigneeAddress,
	            consigneeMobile:consigneeMobile,
	            consigneeEmail:consigneeEmail,
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
	        		// alert('修改失败');
	        		$('#online_box').val(data.status);

 					var element = document.getElementById("online_box").value;
 					if (element == '2') {
 						Command: toastr["error"]("您没有做任何修改", "错误")
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
 	// 关闭修改页面
 	function xs(){
 		var xiaoshi = document.getElementById('xiao');
 		if(xiaoshi){
 			var res = document.getElementById('update');
 			res.style.visibility="hidden";
 		}
 	}

 	function mren(obj){
 		var mid = $(obj).attr('data-mid');
 		// 加载修改事件
	    $.ajax({
	        async: false,
	        url: "/home/wjd/dostatus",
	        data: {
	            mid: mid,
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
	        		// alert('修改失败');
	        		$('#online_box').val(data.status);

 					var element = document.getElementById("online_box").value;
 					if (element == '2') {
 						Command: toastr["error"]("您没有做任何修改", "错误")
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
 
</section>

@endsection


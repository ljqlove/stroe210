@extends('layout.admins')


@section('title',$title)

@section('content')

	 <div class="card-body">
                  <h4 class="card-title">{{$title}}</h4>


              	@if (count($errors) > 0)
					<!-- <div class="mws-form-message error"> -->
						<!-- <div class="mws-form-message"></div> -->
					<div class="btn btn-block btn-lg btn-gradient-primary mt-4 error">
            			<p>显示错误信息</p>
            			<ul style="list-style:none;" id="err">
                		@foreach ($errors->all() as $error)
                			<li style='font-size:20px' >{{$error}}</li>
                		@endforeach
                		</ul>
        			</div>
       		 	@endif
       		 	<br><br>

                  <form action="/admin/message/{{$res->mid}}" method="post" class="mws-form" enctype='multipart/form-data'>

<!--                     <div class="form-group">
                      <label for="exampleInputName1">电话号</label>
                      <input type="text" class="form-control" id="exampleInputName1" 
                      name="phone"
                      value="  @foreach($user as $key=>$val)                     
                                @if($val->uid == $res->uid)
                                 {{($val->phone)}}
                                @endif
                              @endforeach" 
                       placeholder="请输入你的电话号码">
                    </div>
 -->
                     <div>
                      <label for="exampleInputName1">姓名</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="uname" value="{{$res -> uname}}" placeholder="请输入链接名称">
                    </div>

                    <div>
                      <label for="exampleInputName1">昵称</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="mname" value="{{$res -> mname}}" placeholder="请输入链接名称">
                    </div>

                    <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item clearfix">
                      <ul class="mws-form-list inline" style="list-style: none;">
                        <li><label><input type="radio" name='sex' value="m" @if($res->sex == 'm') checked @endif>男</label></li>
                        <li><label><input type="radio" name='sex' value="w" @if($res->sex == 'w') checked @endif>女</label></li>
                        <li><label><input type="radio" name='sex' value="b" @if($res->sex == 'b') checked @endif>保密</label></li>
                      </ul>
                    </div>
                  </div>

                    <div>
                      <label for="exampleInputName1">地址</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="address" value="{{$res -> address}}" placeholder="请输入地址">
                    </div>

                    <div class="form-group">
                      <label>头像</label>
                      <input type="file" name="headpic" class="file-upload-default">
                      <img src="{{$res->headpic}}" alt="" width="80" height="80">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="请选择要上传的图片">
                        <span class="input-group-append">
                          <button class="file-upload-browse btnbadge badge-success" type="button">选择图片...</button>
                        </span>
                      </div>
                    </div>
					   {{csrf_field()}}
              {{method_field('PUT')}}
                    <button type="submit" class="badge badge-success">修改</button>
                  </form>
                </div>




@stop

@section('js')
<script>
	// $('.mws-form-message').delay(2000).fadeOut(2000);
	$('.btn').delay(2000).fadeOut(2000);
</script>
@stop


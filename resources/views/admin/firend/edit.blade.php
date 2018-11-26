@extends('layout.admins')


@section('title',$title)

@section('content')
	  <script src="/admins/js/file-upload.js"></script>

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

                  <form action="/admin/firend/{{$res->fid}}" method="post" class="mws-form" enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="exampleInputName1">链接名称</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="fname" value="{{$res -> fname}}" placeholder="请输入链接名称">
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">链接地址</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="url" placeholder="请输入链接地址" value="{{$res->url}}">
                    </div>


                    <div class="form-group">
                      <label>链接图片</label>
                      <input type="file" name="fpic" class="file-upload-default">
                      <img src="{{$res->fpic}}" alt="" width="80" height="80">
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


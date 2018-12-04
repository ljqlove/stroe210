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

                  <form action="/admin/blog_roles" method="post" class="mws-form" enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="exampleInputName1">角色名称</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="请输入角色名">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">角色描述</label>
                      <input type="text" class="form-control" name="description" placeholder="请描述一下">
                    </div>

					     {{csrf_field()}}
                    <button type="submit" class="badge badge-success">提交</button>
                  </form>
                </div>




@stop

@section('js')
<script>
	// $('.mws-form-message').delay(2000).fadeOut(2000);
	$('.btn-block').delay(2000).fadeOut(2000);
</script>
@stop


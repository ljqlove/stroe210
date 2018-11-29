@extends('layout.admins')


@section('title',$title)

@section('content')
    <style>
        .error{
            background:#FF000080;
            width:90%;
            text-align:center;
            margin-left:50px;
        }
    </style>
          <div class="card-body">
          <h4 class="card-title">{{$title}}</h4>
        @if (count($errors) > 0)
          <div class="alert alert-error alert-dismissible error" id="yqero" role="alert" >
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              @foreach ($errors->all() as $error)
           <li style='font-size:10px;list-style:none;' >{{$error}}</li>            
              @endforeach
          </div>
        @endif
       		 	<br><br>

                  <form action="/admin/firend" method="post" class="mws-form" enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="exampleInputName1">链接名称</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="fname" placeholder="请输入链接名称">
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">链接地址</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="url" placeholder="请输入链接地址">
                    </div>


                    <div class="form-group">
                      <label>链接图片</label>
                      <input type="file" name="fpic" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="请选择要上传的图片">
                        <span class="input-group-append">
                          <button class="file-upload-browse btnbadge badge-success" type="button">选择图片...</button>
                        </span>
                      </div>
                    </div>
					{{csrf_field()}}
                    <button type="submit" class="badge badge-success">提交</button>
                  </form>
                </div>




@stop

@section('js')
<!-- <script>
	// $('.mws-form-message').delay(2000).fadeOut(2000);
	$('#error').delay(2000).fadeOut(2000);
</script> -->
@stop


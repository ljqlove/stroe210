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

                  <form action="/admin/blog_permissions/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="exampleInputName1">路由名称</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$res -> name}}" placeholder="请输入名称">
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">权限描述</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="description" placeholder="请输入链接地址" value="{{$res->description}}">
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


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
    <style>
        .success{
            background:#83E31BFF;
            width:90%;
            text-align:center;
            margin-left:50px;
        }
    </style>
        @if (count($errors) > 0)
          <div class="alert alert-error alert-dismissible error" id="yqero" role="alert" >
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              @foreach ($errors->all() as $error)
           <li style='font-size:10px;list-style:none;' >{{$error}}</li>            
              @endforeach
          </div>
        @endif
       @if(session('success')) 
              <div class="alert alert-success alert-dismissible success" role="alert" >
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                     <li style='font-size:10px;list-style:none;' >{{session('success')}}</li>            
                    
             </div>
       @endif
      <div class="card-body">
      <h4 class="card-title">{{$title}}</h4>
       		 	<br><br>
              
                  <form action="/admin/do_site?id={{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="exampleInputName1">网站标题</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="title" value="{{$res->title}}" placeholder="请输入链接名称">
                    </div> 
                   <div class="form-group">
                      <label for="exampleInputName1">关键词</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="keywords" value="{{$res->keywords}}" placeholder="请输入链接名称">
                    </div>
                   <div class="form-group">
                      <label for="exampleInputName1">网站描述</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="copyright" placeholder="请输入链接地址" value="{{$res->copyright}}">
                    </div>		
  		              <div class="form-group">
                      <label for="exampleInputName1">网站版权</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="description" placeholder="请输入链接地址" value="{{$res->description}}">
                    </div>
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">网站状态</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="statue" id="membershipRadios1" value="ON"
                                @if($res->statue == 'ON') 
                                 checked=""
                                @endif
                                 >
                              <i class="input-helper">&nbsp;&nbsp;开启</i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="statue" id="membershipRadios2" value="OFF"
                                @if($res->statue == 'OFF') 
                                 checked=""
                                @endif
                                >
                              <i class="input-helper">&nbsp;&nbsp;关闭</i></label>
                            </div>
                          </div>
                        </div>

                    <div class="form-group">
                      <label>网站LOGO</label>
                      <input type="file" name="LOGO" class="file-upload-default">
                      <img src="{{$res->LOGO}}" alt="" width="200" height="90">
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


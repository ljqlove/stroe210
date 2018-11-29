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

            <form action="/admin/do_role_per?id={{$res->id}}" method="post" class="mws-form" >
                    <div class="form-group">
                      <label for="exampleInputName1">角色名</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" value='{{$res->name}}'>
                    </div>
                    <div class="form-group>
                        <label class="mws-form-label">权限路由描述</label>
                        <div class="mws-form-item clearfix">
                            <ul>
                                @foreach($per as $k=>$v)
                                	@if(in_array($v->id,$info))
                                     <li  style='float:left;padding:0 10px;  list-style:none'>
                                        <label><input type="checkbox" name='per_id[]' value='{{$v->id}}' checked> {{$v->description}}</label>
                                    </li>
                                    @else
                                     <li  style='float:left;padding:0 10px;  list-style:none'>
                                        <label><input type="checkbox" name='per_id[]' value='{{$v->id}}' > {{$v->description}}</label>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
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


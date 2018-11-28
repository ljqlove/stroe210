@extends('layout.admins')


@section('title',$title)

@section('content')
      <style>
        .success{
            background:#83E31BFF;
            width:90%;
            text-align:center;
            margin-left:50px;
        }
      </style>
       @if(session('success')) 
              <div class="alert alert-success alert-dismissible success" role="alert" >
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                     <li style='font-size:10px;list-style:none;' >{{session('success')}}</li>            
                    
             </div>
         @endif
  <div class="card-body">
            <form class="d-flex align-items-center h-100" action="/admin/blog_user" method="get">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" value="{{$request->user_name}}" class="form-control bg-transparent border-0" placeholder="管理员名称" name="user_name">
                    <button class='btn btn-info'>搜索</button>
                  </div>
                </form>
                  <h4 class="card-title">{{$title}}  <a href="/admin/blog_user/create" class="btn btn-danger radius">添加角色</a></h4>
                  <p class="card-description">

                  </p>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          id
                        </th>
                        <th>
                          管理员名称
                        </th>
                        <th>
                          管理员头像
                        </th>
                        <th>
                          添加时间
                        </th>
                        <th>
                          修改时间
                        </th>
                         <th>
                            操作
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $k=>$v)
                      

                      <tr class="">
                        <td>
                          {{$v->user_id}}
                        </td>
                        <td>
                          {{$v->user_name}}
                        </td>
                        <td><image src="{{$v->user_pic}}" width="80" height="80"></td>
                        <td>
                          {{$v->created_at}}
                        </td> 
                       <td>
                          @if(empty($v->updated_at))
                            您还没有修改过
                          @else 
                            {{$v->updated_at}}
                          @endif

                        </td>
                        <td>
                          <a href="/admin/user_role?id={{$v->user_id}}" class='btn btn-warning'>更改角色</a>

                          <a href="/admin/blog_user/{{$v->user_id}}/edit" class='btn btn-info'>修改</a>

                          
                            <form action="/admin/blog_user/{{$v->user_id}}" method='post' style='display:inline'>
                              {{csrf_field()}}


                              {{method_field("DELETE")}}
                              <button class='btn btn-danger'>删除</button>


                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

            {{$user->appends($request->all())->links()}}

            </div>
@stop

@section('js')
<script>
  // $('.mws-form-message').delay(2000).fadeOut(2000);
  $('.btn-block').delay(2000).fadeOut(2000);
</script>

@stop
        

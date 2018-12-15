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
            <form class="d-flex align-items-center h-100" action="/admin/system" method="get">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>                

                    </div>
                    <input type="text" value="{{$request->title}}" class="form-control bg-transparent border-0" placeholder="管理员名称" name="uname">
                    <button class='btn btn-info'>搜索</button>
                  </div>
                </form>
                  <h2 class="card-title">{{$title}}</h2>

                  <p class="card-description">

                  </p>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          id
                        </th>
                        <th>
                          内容
                        </th>
                        <th>
                        管理员名称
                        </th>
                        <th>
                        状态
                        </th>
                        <th>
                        头像
                        </th>
                        <th>
                          角色
                        </th>

                        <th>
                          时间
                        </th>
                         <th>
                            操作
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($system as $k=>$v)
                      
                      <tr class="">
                        <td>
                          {{$v->id}}
                        </td>
                        <td>
                          {{$v->title}}
                        </td>
                      @foreach($user as $uk=>$uv)
                      <!-- 判断管理员表的user_id和系统日志的uid是否相等 -->
                        @if($uv->user_id == $v->uid)
                          <td>
                            {{$v->uname}}
                          </td>
                          
                        @if($uv->status == 1)
                         <td>
                            <label class="badge badge-gradient-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">可以登录</font></font></label>
                          </td>
                        @endif
                        @if($uv->status == 0)
                           <td>
                            <label class="badge badge-gradient-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">不可登陆</font></font></label>
                          </td>
                        @endif
                          
                          </td>
                          <td><image src="{{$uv->user_pic}}" width="80" height="80"></td>
                        @endif
                        <!--  -->
                        @foreach($role_user as $ruk => $ruv)
                        @endforeach
                        <!-- 判断管理员角色表的user_id与管理员表的id是否相等 -->
                          @if($ruv->user_id == $uv->user_id)
                            @foreach($roles as $rk => $rv)
                            <!-- 判断角色表的id与管理员角色表是否相等 -->
                              @if($rv->id == $ruv->role_id)
                              
                                @if($v->uid == '1')
                                  <td>超级管理员</td>
                                @else
                                <td>
                                  {{$rv->name}}
                                </td>
                                @endif
                              @endif
                            @endforeach
                          @endif
                      @endforeach
                        <td>
                          {{$v->created_at}}
                        </td>
                        <td>
                          @if($v->uid == 1)
                            <a href="javescript:vode(0)" class='btn btn-info' style="width: 90.4px;color:red"">不可禁止</a>
                          @endif
                          @php
                            $blog = \DB::table('blog_user')->where('user_id',$v->uid)->first();
                          @endphp 
                          @if($blog->status == 0)
                            <a href="javescript:vode(0)" class='btn btn-info' style="width: 90.4px;color:yellow">已禁登陆</a>
                          @endif
                          @if($blog->status == 1 and $blog->user_id != 1)
                          <form action="/admin/system/{{$v->uid}}" method='post' style='display:inline'>
                              {{csrf_field()}}
                              {{method_field('PUT')}}
                                    
                              <button class='btn btn-info'>禁止登陆</button>


                            </form>
                          @endif
                          
                          @if($blog->status == 0)
                            <form action="/admin/do_update?id={{$v->uid}}" method='post' style='display:inline'>
                              {{csrf_field()}}
                                    
                              <button class='btn btn-info'>恢复登陆</button>


                            </form>
                          @else
    
                            <form action="/admin/system/{{$v->id}}" method='post' style='display:inline'>
                              {{csrf_field()}}
                              {{method_field("DELETE")}}
                              <button class='btn btn-danger' style="width: 90.4px">删除记录</button>
                            </form>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

            {{$system->appends($request->all())->links()}}

            </div>
@stop

@section('js')
<script>
  // $('.mws-form-message').delay(2000).fadeOut(2000);
  $('.btn-block').delay(2000).fadeOut(2000);
</script>

@stop
        

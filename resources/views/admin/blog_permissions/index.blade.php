@extends('layout.admins')


@section('title',$title)

@section('content')
  <div class="card-body">
            <form class="d-flex align-items-center h-100" action="/admin/blog_permissions" method="get">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" value="{{$request->description}}" class="form-control bg-transparent border-0" placeholder="描述" name="description">
                    <button class='btn btn-info'>搜索</button>
                  </div>
                </form>
                  <h4 class="card-title">{{$title}}  <a href="/admin/blog_permissions/create" class="btn btn-danger radius">添加权限</a></h4>
                  <p class="card-description">

                  </p>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          id
                        </th>
                        <th>
                          路由名称
                        </th>
                        <th>
                          权限描述描述
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
                    @foreach($permissions as $k=>$v)
                      

                      <tr class="">
                        <td>
                          {{$v->id}}
                        </td>
                        <td>
                          {{$v->name}}
                        </td>
                        <td>
                          {{$v->description}}
                        </td>
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
                          <a href="/admin/blog_permissions/{{$v->id}}/edit" class='btn btn-info'>修改</a>


                            <form action="/admin/blog_permissions/{{$v->id}}" method='post' style='display:inline'>
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

            {{$permissions->appends($request->all())->links()}}

            </div>
@stop

@section('js')
<script>
  // $('.mws-form-message').delay(2000).fadeOut(2000);
  $('.btn-block').delay(2000).fadeOut(2000);
</script>

@stop
        

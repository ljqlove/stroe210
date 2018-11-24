@extends('layout.admins')

@section('title',$title)

@section('content')
  <div class="card-body">
                  <h4 class="card-title">{{$title}}</h4>
                  <form class="d-flex align-items-center h-100" action="/admin/user" method="get">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>                
                    </div>
                    <input type="text" class="form-control bg-transparent border-0" placeholder="搜索手机号" name="phone">
                    <button class='btn btn-info'>搜索</button>
                  </div>
                </form>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          手机号
                        </th>
                        <th>
                          权限
                        </th>
                        <th>
                          状态
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
                      @foreach($users as $k=>$v)
                      
                      <tr class="table-info">
                        <td>
                          {{$v->uid}}
                        </td>
                        <td>
                          {{$v->phone}}
                        </td>
                        <td>
                          @if($v->auth=='0')
                              超级管理员
                          @elseif($v->auth=='1') 
                              客户
                          @else($v->auth=='2')
                              会员
                          @endif 
                        </td>
                        <td>
                          @if($v->status=='0')
                              禁用
                          @else($v->status=='1')
                              开启
                          @endif
                        </td>
                        <td>
                          {{$v->inputtime}}
                        </td>
                        <td>
                          <a href="/admin/user/{{$v->uid}}/edit" class='btn btn-info'>修改</a>

                            <form action="/admin/user/{{$v->uid}}" method='post' style='display:inline'>
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

        <div class="template-demo">
        <div class="btn-group" role="group" aria-label="Basic example">
              {{ $users->links() }}
        </div>
        </div>
                        
@stop

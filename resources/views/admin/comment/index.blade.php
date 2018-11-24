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
                          用户编号
                        </th>
                        <th>
                          评论内容
                        </th>
                        <th>
                          等级
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
                      
                      
                      <tr class="table-info">
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                          
                        </td>
                        <td>
                          
                        </td>
                        <td>
                          
                        </td>
                        <td>
                          <a href="" class='btn btn-info'>修改</a>

                            <form action="" method='post' style='display:inline'>
                              {{csrf_field()}}

                              {{method_field("DELETE")}}
                              <button class='btn btn-danger'>删除</button>

                            </form>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>

        <div class="template-demo">
        <div class="btn-group" role="group" aria-label="Basic example">

        </div>
        </div>
@stop
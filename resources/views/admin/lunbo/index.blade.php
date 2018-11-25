@extends('layout.admins')

@section('title',$title)

@section('content')
	              <div class="card-body">
                  <h4 class="card-title">{{$title}}</h4>
    
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          链接地址
                        </th>
                        <th>
                          图片
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
                          <a href="/admin/lunbo/" class='btn btn-info'>修改</a>
                            <form action="/admin/lunbo/" method='post' style='display:inline'>
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
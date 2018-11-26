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
                      @foreach($lunbo as $k=>$v)
                      <tr class="table-info">
                        <td>
                        {{$v->lid}}
                        </td>
                        <td>
                        {{$v->url}}
                        </td>
                        <td>
                        <img src="{{$v->pic}}" alt="">
                        </td>
                        <td>
                          <a href="/admin/lunbo/{{$v->lid}}/edit" class='btn btn-info'>修改</a>
                            <form action="/admin/lunbo/{{$v->lid}}" method='post' style='display:inline'>
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

        </div>
        </div>
@stop
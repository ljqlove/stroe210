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
                          用户编号
                        </th>
                        <th>
                          评论内容
                        </th>
                        <th>
                          评价
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
                      
                      @foreach($comment as $k=>$v)
                      <tr class="table-info">
                        <td>
                        {{$v->cid}}
                        </td>
                        <td>
                        @foreach($ucomm as $kk=>$vv)
                          @if($v->uid==$vv->uid)
                            {{$vv->uid}}
                          @endif  
                        @endforeach
                        </td>
                        <td>
                        {{$v->content}}
                        </td>
                        <td>
                        @if($v->star==1)
                          ★
                        @elseif($v->star==2)
                          ★★
                        @elseif($v->star==3)
                          ★★★
                        @elseif($v->star==4)
                          ★★★★
                        @else($v->star==5)
                          ★★★★★
                        @endif
                        </td>
                        <td>
                        {{$v->inputtime}}
                        </td>
                        <td>
                            <form action="/admin/comment/{{$v->cid}}" method='post' style='display:inline'>
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
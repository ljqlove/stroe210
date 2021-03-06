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
            <form class="d-flex align-items-center h-100" action="/admin/firend" method="get">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>                

                    </div>
                    <input type="text" value="{{$request->fname}}" class="form-control bg-transparent border-0" placeholder="链接名称" name="fname">
                    <button class='btn btn-info'>搜索</button>
                  </div>
                </form>
                  <h4 class="card-title">{{$title}}  <a href="/admin/firend/create" class="btn btn-danger radius">添加链接</a></h4>

                  <p class="card-description">

                  </p>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          id
                        </th>
                        <th>
                          链接名称
                        </th>
                        <th>
                          链接地址
                        </th>
                        <th>
                          链接图片
                        </th>
                        <th>
                          添加时间
                        </th>
                         <th>
                            操作
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($friend as $k=>$v)
                      

                      <tr class="">
                        <td>
                          {{$v->fid}}
                        </td>
                        <td>
                          {{$v->fname}}
                        </td>
                        <td>
                          {{$v->url}}
                        </td>
                          <td><image src="{{$v->fpic}}" width="80" height="80"></td>
                        <td>
                          {{$v->inputtime}}
                        </td>
                        <td>
                          <a href="/admin/firend/{{$v->fid}}/edit" class='btn btn-info'>修改</a>


                            <form action="/admin/firend/{{$v->fid}}" method='post' style='display:inline'>
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

            {{$friend->appends($request->all())->links()}}

            </div>
@stop

@section('js')
<script>
  // $('.mws-form-message').delay(2000).fadeOut(2000);
  $('.btn-block').delay(2000).fadeOut(2000);
</script>

@stop
        

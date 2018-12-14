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
            <form class="d-flex align-items-center h-100" action="/admin/message" method="get">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>                

                    </div>
                    <input type="text" value="{{$request->uname}}" class="form-control bg-transparent border-0" placeholder="链接名称" name="uname">
                    <button class='btn btn-info'>搜索</button>
                  </div>
                </form>
                  <h4 class="card-title">{{$title}}</h4>
                  <p class="card-description">

                  </p>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          id
                        </th>
                        
                        <th>
                          姓名
                        </th>
                        <th>
                          昵称
                        </th>
                        <th>
                          性别
                        </th>
                        <th>
                          用户电话
                        </th>
                        <th>
                          地址
                        </th>
                        <th>
                          头像
                        </th>
<!--                          <th>
                            操作
                        </th> -->
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($message as $k=>$v)
                      

                      <tr class="">
                        <td>
                          {{$v->mid}}
                        </td>
                       
                        <td>
                          {{$v->uname}}
                        </td>
                        <td>
                          {{$v->mname}}
                        </td>
                         <td>
        						  @if($v->sex == 'b')
        						  	保密
        						  @elseif($v->sex == 'm')
        						  	男
        						  @elseif($v->sex == 'w')
        						  	女
        						  @endif
                        </td>
                      @foreach($user as $key=>$val)                     
                        @if($val->uid == $v->uid)
                         <td>
                          {{($val->phone)}}
                        </td>
                      @php
                          $address = DB::table('address')->where('uid',$val->uid)->where('status','1')->first();
                      @endphp
                        <td align="center">
                          @if(empty($address))
                          尚无地址
                          @else
                          {{$address->address}}
                          @endif
                      </td>
                        @endif
                      @endforeach

                          <td><image src="{{$v->headpic}}" width="80" height="80"></td>
<!--                         <td>
                          <a href="/admin/message/{{$v->mid}}/edit" class='btn btn-info'>修改</a>


                            <form action="/admin/message/{{$v->mid}}" method='post' style='display:inline'>
                              {{csrf_field()}}


                              {{method_field("DELETE")}}
                              <button class='btn btn-danger'>删除</button>


                            </form>
                        </td> -->
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

            {{$message->appends($request->all())->links()}}

            </div>
@stop

@section('js')
<script>
  // $('.mws-form-message').delay(2000).fadeOut(2000);
  $('.btn-block').delay(2000).fadeOut(2000);
</script>

@stop
        

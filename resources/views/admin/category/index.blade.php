@extends('layout.admins')

@section('title',$title)

@section('content')
	<title>{{$title}}</title>
      <div class="card-body">

               <div class="card-body">
                  <h4 class="card-title">分类列表</h4>
                  
                   <!-- 搜索 -->
                    <div class="input-group">
                            <form  action="" method="get">
                                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" value="{{$request->tname}}" aria-describedby="basic-addon2" name='tname' >
                                <div class="input-group-append">
                                  <button class="btn btn-sm btn-gradient-primary" type="button">搜索</button>
                                </div>
                            </form>
                    </div>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          id
                        </th>
                        <th>
                          类名
                        </th>
                        <th>
                          主分类
                        </th>
                        <th>
                          路径
                        </th>
                        <th>
                          状态
                        </th>
                         <th>
                          操作
                        </th>
                      </tr>
                    </thead>


                    <tbody>
                      @foreach($res as $k => $v)
                      <tr>
                        <td>
                          {{$v->tid}}
                        </td>
                        <td>
                          {{$v->tname}}
                        </td>
                        
                        
                        <td>
                          
                          @if($v->pid == 0)
                          顶级分类
                          @endif
                          @foreach($pids as $k1 => $v1)
                          @if($v->pid == $v1->tid)
                          {{$v1->tname}}
                          @endif
                          @endforeach
                        </td>
                        

                        <td>
                          {{$v->path}}
                        </td>
                        
                        <td class=" ">
                          @if($v->status== 1)

                            启用
                          @else 
                            禁用

                          @endif
                        </td>
                        
                        <td class=" ">
                            <a href="/admin/category/{{$v->tid}}/edit" class='btn btn-info'>修改</a>

                            <form action="/admin/category/{{$v->tid}}" method='post' style='display:inline'>
                              {{csrf_field()}}

                              {{method_field("DELETE")}}
                              <button class='btn btn-danger'>删除</button>

                            </form>


                      </tr>
                       @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
                

                <style>

      .pagination li a{

        color: #fff;
      }
        
        .pagination li{
          float: left;
            height: 20px;
            padding: 0 10px;
            display: block;
            font-size: 12px;
            line-height: 20px;
            text-align: center;
            cursor: pointer;
            outline: none;
            background-color: #444444;
            
            text-decoration: none;
          
            border-right: 1px solid rgba(0, 0, 0, 0.5);
            border-left: 1px solid rgba(255, 255, 255, 0.15);
           
            box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        }

        .pagination  .active{
              color: #323232;
              border: none;
              background-image: none;
              background-color: #88a9eb;
             
              box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
        }

        .pagination .disabled{
          color: #666666;
            cursor: default;

        }
        
        .pagination{
          margin:0px;
        }
        
      </style>
              <!-- <div class="btn-group" role="group" aria-label="Basic example"> -->
                        {{$res->appends($request->all())->links()}}
              <!-- </div> -->


@stop





















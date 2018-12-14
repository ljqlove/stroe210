@extends('layout.admins')

@section('title',$title)

@section('content')
  
                    
        
<div class="card-body">
                  <h4 class="card-title">浏览广告</h4>
                  <p class="card-description">
                    index advert
                  </p>
                  

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          ID
                        </th>

                        <th>
                          广告名称
                        </th>

                        <th>
                          广告图片
                        </th>

                        <th>
                          操作
                        </th>
                        
                        <th>
                          应用界面
                        </th>

                         <th>
                          状态
                        </th>

                        
                      </tr>
                    </thead>


                    <tbody>
                      @foreach($advert as $k=>$v)
                      <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        <td><img src="{{$v->img}}" style="width: 50px; height: 50px;"></td>
                        <td>
                          @if($v->status == 1)
                          以启用
                          @else
                          已禁用
                          @endif
                        </td>
                        <td>
                          商品详情
                        </td>
                        <td class=" ">
                            <a href="/admin/advert/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                            <form action="" method='post' style='display:inline'>
                              {{csrf_field()}}

                              
                              <!-- <button class='btn btn-danger'>删除</button> -->
                              @if($v->status == 1)
                              <a href="" class='btn btn-info'>禁用</a>
                              @else
                              <a href="#" class='btn btn-info'>启用</a>
                              @endif

                            </form>
                          </td>
                      </tr>
                    
                    @endforeach

                    </tbody>
                  </table>
                </div>
              

@stop



@extends('layout.admins')

@section('title',$title)

@section('content')
  
                    
        
<div class="card-body">
                  <h4 class="card-title">浏览商品属性</h4>
                  <p class="card-description">
                    index shop
                  </p>
                  

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          ID
                        </th>

                        <th>
                          商品名称
                        </th>

                        <th>
                          商品颜色
                        </th>

                        <th>
                          商品尺寸
                        </th>

                        <th>
                          商品颜色图片
                        </th>

                        <th>
                          商品颜色价格
                        </th>

                        <th>
                          操作
                        </th>
                      </tr>
                    </thead>


                    <tbody>
                      @foreach($res as $k=>$v)
                      <tr>
                        <td class="py-1">
                        {{$v->id}}
                        </td>
                       
                        <td>
                          @foreach($goods as $gk=>$gv)
                          {{$gv->gname}}
                          @endforeach
                        </td>

                        <td>
                          {{$v->gcolor}}
                        </td>
                        <td>
                          {{$v->gsize}}
                        </td>

                        <td>
                          <img src="{{$v->cimgs}}" style="width: 50px; height: 50px;">
                        </td>

                        <td>
                          {{$v->gpic.'.00'}}
                        </td>
                        
                        <td class=" ">
                            <a href="/admin/gsize/edit/{{$v->id}}" class='btn btn-info'>修改</a>

                            <form action="/admin/gsize/del/{{$v->id}}" method='post' style='display:inline'>
                              {{csrf_field()}}

                              <!-- {{method_field("DELETE")}} -->
                              <button class='btn btn-danger'>删除</button>

                            </form>
                          </td>
                      </tr>
                      
                      @endforeach
                    

                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-gradient-primary mr-2"><a href='admin/gsadd/{{$gid}}' style="text-decoration:none;color:white;" >添加样式</a></button>
                </div>
              

@stop



@extends('layout.admins')

@section('title',$title)

@section('content')

        
<div class="card-body" >
   <!-- 搜索 -->
                  <div class="input-group">
                            <form  action="/admin/flash" method="get">
                                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" value="{{$request->fname}}" aria-describedby="basic-addon2" name='fname' >
                                <div class="input-group-append">
                                  <button class="btn btn-sm btn-gradient-primary" type="button">搜索</button>
                                </div>
                            </form>
                    </div>

                  <h4 class="card-title">浏览快讯</h4>
                  <p class="card-description">
                    index flash
                  
                  </p>

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          ID
                        </th>

                        <th>
                          快讯标题
                        </th>

                        <th>
                          快讯内容
                        </th>

                        <th>
                          快讯时间
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
                          {{$v->fname}}
                        </td>
                        <td >
                          {!!$v->content!!}
                        </td>

                        <td>
                          {{$v->ftime}}
                        </td>

                        
                        <td class=" ">

                          <a href="/admin/flash/{{$v->id}}/edit" class='btn btn-info'>修改内容</a>

                            <form action="/admin/flash/{{$v->id}}" method='post' style='display:inline'>
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
          
@stop



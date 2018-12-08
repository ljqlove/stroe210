@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="card-body">
      <h4 class="card-title">浏览商品</h4>
      <p class="card-description">
        index shop
      </p>

      <!-- 搜索 -->
      <div class="input-group">
                <form  action="/admin/goods" method="get">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" value="{{$request->gname}}" aria-describedby="basic-addon2" name='gname' >
                    <div class="input-group-append">
                      <button class="btn btn-sm btn-gradient-primary" type="button">搜索</button>
                    </div>
                </form>
        </div>

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
              生产厂家
            </th>
             <th>
              默认尺寸
            </th>
            <th>
              单价
            </th>
            <th>
              商品默认图片
            </th>
            <th>
              库存量
            </th>
            <th>
              简介
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
          @foreach($res as $k=>$v)
          <tr>
            <td class="py-1">
            {{$v->gid}}
            </td>

            <td>
              {{$v->gname}}
            </td>
            <td>
              {{$v->company}}
            </td>
            <td>
              {{$v->size}}
            </td>
             <td>
              {{$v->price.'.00'}}
            </td>
            <td>
              <img src="{{$v->gpic}}" style="width: 50px; height: 50px;">
            </td>
            <td>
              {{$v->stock}}
            </td>
            <td>
              {!!$v->descript!!}
            </td>
            <td>
              @if($v->status == 0)
              新品
              @elseif($v->status == 1)
              上架
              @elseif($v->status == 2)
              下架
              @endif
            </td>

            <td class=" ">
                <a href="/admin/gsize/{{$v->gid}}" class='btn btn-info'>颜色,尺寸</a>
                <a href="/admin/goods/{{$v->gid}}/edit" class='btn btn-info'>修改</a>

                <form action="/admin/goods/{{$v->gid}}" method='post' style='display:inline'>
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

    {{$res->appends($request->all())->links()}}

@stop



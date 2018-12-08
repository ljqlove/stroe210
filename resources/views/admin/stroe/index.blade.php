@extends('layout.admins')

@section('content')
    <style>
        .success{
            background:#83E31BFF;
            width:90%;
            text-align:center;
            margin-left:50px;
        }
        .error{
            background:#FF000080;
            width:90%;
            text-align:center;
            margin-left:50px;
        }
    </style>

    <div class="content-wrapper">
          <div class="alert alert-success alert-dismissible success suc" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>success!</strong> {{session('success')}}
          </div>
          <div class="alert alert-error alert-dismissible error err" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>error!</strong> {{session('error')}}
          </div>
        @if(session('success'))
          <div class="alert alert-success alert-dismissible success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>success!</strong> {{session('success')}}
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-error alert-dismissible error" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>error!</strong> {{session('error')}}
          </div>
        @endif
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                  <form action="/admin/order" method="get">
                    <div  class="input-group col-md-4 pull-right" style="margin-right:150px">
                        <input type="text" class="form-control" name="ordernum" placeholder="请输入订单号...">
                        <span class="input-group-btn">
                          {{csrf_field()}}
                          <button class="btn btn-secondary" type="submit">搜索</button>
                        </span>
                    </div>
                  </form>
                  <div>
                    <h4 class="card-title">订单列表</h4>
                    <p class="card-description">
                      订单管理 >><code>订单列表</code>
                    </p>
                  </div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <!-- <th>ID</th> -->
                        <th>商家ID</th>
                        <th>店铺名</th>
                        <th>注册者</th>
                        <th>掌柜</th>
                        <th>注册电话</th>
                        <th>注册时间</th>
                        <th>订单状态</th>
                        <th>操作</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $v)
                        @php
                          $res = \DB::table('message')->where('uid',$v->uid)->first();
                        @endphp
                        <tr>
                            <td class="id">{{$v->id}}</td>
                            <td class="oname">{{$v->company}}</td>
                            <td class="uname">{{$res->uname}}</td>
                            <td class="address">{{$v->uname}}</td>
                            <td class="phone">{{$v->iphone}}</td>
                            <td class="num">{{$v->create_at}}</td>
                              @if($v->status == 0)
                            <td class="status" val="0"><mark class="bg-primary text-white">申请待处理</mark></td>
                            @elseif($v->status == 1)
                            <td class="status" val="1"><mark class="bg-success text-white">申请已通过</mark></td>
                            @elseif($v->status == 2)
                            <td class="status" val="2"><mark class="bg-danger text-white">申请未通过</mark></td>
                            @endif
                            <td class="del"><button type="button" class="btn btn-gradient-danger btn-rounded "><i class="mdi mdi-delete"></i>删除</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation">
                      {{-- $lists->render() --}}
                  </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

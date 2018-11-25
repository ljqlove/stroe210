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
                  <h4 class="card-title">订单列表</h4>
                  <p class="card-description">
                    订单管理 >><code>订单列表</code>
                  </p>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>商品名</th>
                        <th>购买用户</th>
                        <th style="width:200px">发货地址</th>
                        <th>收货电话</th>
                        <th>数量</th>
                        <th>总价</th>
                        <th>用户留言</th>
                        <th>订单状态</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $v)
                        <tr>
                            <td class="oid">{{$v->oid}}</td>
                            <td class="uid" style="display: none;">{{$v->uid}}</td>
                            <td class="oname">{{$v->oname}}</td>
                            <td class="uname">{{$v->uname}}</td>
                            <td class="address">{{$v->address}}</td>
                            <td class="phone">{{$v->phone}}</td>
                            <td class="num">{{$v->num}}</td>
                            <td class="total">{{$v->total}}</td>
                            <td class="msg">{{$v->msg}}</td>
                            @if($v->status == 0)
                            <td class="status" val="0"><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">无效订单</button></td>
                            @elseif($v->status == 1)
                            <td class="status" val="1"><button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm">新订单</button></td>
                            @elseif($v->status == 2)
                            <td class="status" val="2"><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">已发货</button></td>
                            @elseif($v->status == 3)
                            <td class="status" val="3"><button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm">已收货</button></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation">
                      {!! $lists->render() !!}
                  </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form action="/admin/order" method="post">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" id="optionsRadios0" value="0">
                      无效订单
                    <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="1" >
                      新订单
                    <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="2" >
                      已发货
                    <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" id="optionsRadios3" value="3">
                      已收货
                    <i class="input-helper"></i></label>
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="oid" value="">
                  <button type="submit" class="btn btn-gradient-primary mr-2">确定</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
    <script>

    $('.status').click(function(){
        var tr = $(this).parents('tr');
        var oid = tr.find('.oid').text();
        var status = tr.find('.status').attr('val');
        $('input[name=oid]').val(oid);
        $('#optionsRadios'+status).attr('checked','checked');
    })

    //双击用户名进行修改
    $('td').dblclick(function(){

        // 获取类的值
        var cl = $(this).attr('class');

        //获取用户名
        var um = $(this).html().trim();

        var url = '';
        var id = '.oid';
        if (cl == 'oname') {
            url = '/admin/oajax';
        } else if(cl == 'uname') {
            id = '.uid';
            url = '/admin/uajax';
        } else if(cl == 'address') {
            url = '/admin/adajax';
        } else if(cl == 'phone') {
            url = '/admin/phajax';
        } else if(cl == 'num') {
            url = '/admin/numajax';
        } else {
            return $(this).html(um).stop();
        }

        //创建input
        var ipu = $('<input type="text" />');
        $(this).empty();
        $(this).append(ipu);
        ipu.val(um);
        ipu.select();
        var tds = $(this);

        //失去焦点
        ipu.blur(function(){
            //获取input框里面的值
            var uv = $(this).val();

            //获取用户id
            var ids = $(this).parents('tr').find(id).eq(0).text().trim();
            var dan = $(this).parents('tr').find('.total').eq(0).text().trim();
            // console.log(ids);
            $.get(url,{uv:uv,ids:ids},function(data){

                if(data == 1){

                    if (cl == 'num') {
                        var total = dan*uv;
                        $(this).parents('tr').find('.total').eq(0).text(total);
                    }
                    //让输入框消失  但是输入框里面的值留下
                    tds.text(uv);
                } else {

                    tds.text(um);
                }
            })
        })
    })

    </script>
@stop

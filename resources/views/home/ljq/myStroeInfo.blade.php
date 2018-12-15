@extends('layout.mymsg')
@section('title',$title)

@section('content')
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <script src="/bs/js/bootstrap.min.js"></script>
    <style>
        /*灰色遮罩层*/
        .faded{
            width:100%;
            height:100%;
            background:rgba(0, 0, 0, 0.5);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 99;
        }
        /*弹出层*/
        .succ-pop{
            width: 400px;
            height: auto;
            background: #888;
            position: fixed;
            left: 50%;
            top: 50%;
            /*margin-left: -200px;*/
            /*margin-top: -150px;*/
            z-index: 999;
            border-radius: 5px;
        }
        .succ-pop li{
            text-align: center;
            font-size: 22px;
            color: #ce002c;
            margin-top:20px;
        }
        .select{
            width:150px;
            margin-left:20px;
        }
        #s2,#s3{
            display: none;
        }
    </style>
    <!-- 模态弹框  start-->
    <div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">添加商品</h4>
              </div>
            <form action="/home/addgood" method="post" enctype="multipart/form-data">
                <input type="hidden" name="company" value="{{$myStroeInfo->id}}">
                {{ csrf_field() }}
              <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">类别:</label>
                    <div>
                        @php
                            $res = \DB::table('type')->where('pid','0')->get();
                        @endphp
                        <!-- /////////////////////////////////////////// -->
                        <select name="type1" id="s1" class="form-control select pull-left">
                            <option value="" id="o1">--请选择--</option>
                            @foreach($res as $v)
                            <option value="{{$v->tid}}">{{$v->tname}}</option>
                            @endforeach
                        </select>
                      <!-- /////////////////////////////////////////// -->
                        <select name="type2" id="s2" class="form-control select pull-left">
                            <option value="" id="o2">--请选择--</option>

                        </select>

                      <!-- /////////////////////////////////////////// -->
                        <select name="type3" id="s3" class="form-control select pull-left">
                            <option value="" id="o3">--请选择--</option>

                        </select>
                        <div style="clear:both"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">商品名:</label>
                   <input type="text" class="form-control" name="gname">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">标价:</label>
                   <input type="text" class="form-control" name="price">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">上架图片:</label>
                   <input type="file"  name="gpic">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">库存:</label>
                   <input type="text" class="form-control" name="stock">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">颜色:</label><br>
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="红色"> 红色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="橙色"> 橙色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="黄色"> 黄色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="绿色"> 绿色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="青色"> 青色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="蓝色"> 蓝色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="紫色"> 紫色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="灰色"> 灰色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="黑色"> 黑色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="卡其色"> 卡其色
                   <input type="checkbox" class="form-checkbox" name="gcolor[]" value="土豪金"> 土豪金
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">大小:</label>
                   <input type="text" class="form-control" name="gsize"><span>(多个尺寸之间用,隔开)</span>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">请对您的商品做一个简短的描述:</label>
                    <textarea name="descript" class="form-control"></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">添加商品</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>
    <!-- 模态弹框  end-->
        @if (count($errors) > 0 )
            <ul class="succ-pop"  id="goodform">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="guan"><span aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
    <div class="containers"><div class="pc-nav-item"><a href="#" class="pc-title">首页</a> > <a href="/home/myStroe">我的店铺</a> > <a href="javascript:void(0)">我的商品</a> </div></div>
    <div class="containers"><div class="pc-add-item"><img width="1200" height="315" src="{{$myStroeInfo->image}}"></div></div>
    <div class="pc-buying clearfix">
    <div class="time-list time-list-w fl">
        <div class="time-title time-clear">
            <h2>&nbsp;</h2>
            <div class="time-item fl clearfix">

            </div><!--倒计时模块-->
            @if($myStroeInfo->uid == session('userinfo')['uid'])
            <button type="button" class="btn btn-link pull-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">商品添加>>   </button>
            @else
            <a href="javascript:;" class="reds fr">收藏店铺&gt;</a>
            @endif
        </div>
        <div class="time-border time-border-h time-border-list clearfix">
            <ul>
                @foreach($goods as $v)
                <li>
                    <a href="/home/goodinfo/{{$v->gid}}"> <img width="250" height="250" src="{{$v->gpic}}"></a>
                    <p class="head-name"><a href="/home/goodinfo/{{$v->gid}}">{{$v->gname}}</a> </p>
                    <p><span class="price">￥{{$v->price}}</span><br><span class="">{{date('Y年m月d日',strtotime($v->inputtime))}}上架</span></p>
                    <p class="head-futi"><spn>好评度：90% </spn> <span>（100人评价）</span></p>
                    <p class="label-default">暂无折扣</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
    <script>
    $('#s1').change(function(){
        $('#s2').show();
        $('#s2').empty();
        $('#s3').hide();
        var v1 = $(this).val();
        $.ajax({
             url: '/home/select',
             type: 'GET',
             dataType: 'json',
             data:{pid:v1},
             error: function(data){
                alert('没有分类了!');
             },  //错误执行方法
             success: function(data){
                if(data.length){
                    //遍历二级分类
                    $('#s2').attr('disabled',false);
                    $('#o2').text('--请选择--');
                    for (var i = 0; i < data.length; i++) {
                        var op = new Option(data[i].tname, data[i].tid);
                        console.log(op);
                        $('#s2').append(op);
                    }
                } else {
                    $('#s2').attr('disabled',true);
                    alert('没有分类了!');

                }


             } //成功执行方法
         });
        return false;
    })

    $('#s2').change(function(){
        $('#s3').show();
        $('#s3').empty();
        var v2 = $(this).val();
        $.ajax({
             url: '/home/select',
             type: 'GET',
             dataType: 'json',
             data:{pid:v2},
             error: function(data){
                alert('没有分类了!');
             },  //错误执行方法
             success: function(data){

                if(data.length){
                    //遍历二级分类
                    $('#s3').attr('disabled',false);
                    $('#o3').text('--请选择--');
                    for (var i = 0; i < data.length; i++) {
                        var op = new Option(data[i].tname, data[i].tid);
                        console.log(op);
                        $('#s3').append(op);
                    }
                } else {
                    $('#s3').attr('disabled',true);
                    alert('没有分类了!');
                }

             } //成功执行方法
         });
        return false;
    })
    $('#guan').css('cursor','pointer');
    $('#guan').click(function(){
        $('#goodform').hide();
    })
    $('#addgood').click(function(){
        $('#goodform').show();
    })

    </script>
@endsection
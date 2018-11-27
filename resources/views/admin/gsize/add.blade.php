@extends('layout.admins')

@section('title',$title)

@section('content')
<div class="content-wrapper">
          
          @if (count($errors) > 0)
          <div class="btn btn-gradient-primary mr-2" id="mr-2" style="width: 800px">
                  显示错误信息
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li style='font-size:14px'>{{$error}}</li>
                      @endforeach
                    </ul>
                </div>
                @endif
                <br>
                <br>


                <div class="card-body">
                  <h4 class="card-title">商品颜色添加</h4>
                  <p class="card-description">
                    create gsize
                  </p>

                  <form class="forms-sample" action="/admin/gsize/save/{{$gid}}" method="post" class="mws-form" enctype='multipart/form-data'>


                    <div class="form-group">
                      <label for="exampleInputName1">商品名称</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="gname" name="gname" value="@foreach($goods as $gk=>$gv){{$gv->gname}}@endforeach">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail3">商品颜色</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="gcolor" name="gcolor">
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">商品尺寸</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="gsize" name="gsize">
                      </div>
                    
                    <div class="form-group">
                      <label>商品颜色图片</label>
                     <input type="file" name='cimgs' >
                     
                    </div>

                    <div class="form-group">
                      <label for="exampleInputCity1">商品颜色价格</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="gpic" name="gpic">
                    </div>
                    
                    <button type="submit" class="btn btn-gradient-primary mr-2">提交</button>
                    {{csrf_field()}}
                    <!-- <button class="btn btn-light">重置</button> -->
                  </form>
                </div>
    
</div>



@stop
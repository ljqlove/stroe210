@extends('layout.admins')

@section('title',$title)

<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

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
                  <h4 class="card-title">商城快讯</h4>
                  <p class="card-description">
                    create flash
                  </p>

                  <form class="forms-sample" action="/admin/flash" method="post" class="mws-form" enctype='multipart/form-data'>


                    <div class="form-group">
                      <label for="exampleInputName1">快讯名称</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="fname" name="fname" >
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">作者署名</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="writer" name="writer" >
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">简介</label>
                      <script id="editor" name='content' type="text/plain" style="width:1145px;height:500px;"></script>
                    </div>



                    <button type="submit" class="btn btn-gradient-primary mr-2">提交</button>
                    {{csrf_field()}}
                    <!-- <button class="btn btn-light">重置</button> -->
                  </form>
                </div>

</div>
<script>
   var ue = UE.getEditor('editor');
</script>


@stop
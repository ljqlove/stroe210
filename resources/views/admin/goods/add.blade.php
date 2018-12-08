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
                  <h4 class="card-title">商品添加</h4>
                  <p class="card-description">
                    create goods
                  </p>

                  <form class="forms-sample" action="/admin/goods" method="post" class="mws-form" enctype='multipart/form-data'>

                    <select class="form-control" id="exampleFormControlSelect2" name="tid">

                        <option value="0">请选择</option>
                        @foreach($rs as $v)
                        <option value='{{$v->tid}}'>{{$v->tname}}</option>
                        @endforeach
                    </select><br>

                    <div class="form-group">
                      <label for="exampleInputName1">商品名称</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="gname" name="gname">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail3">生产厂家</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="company" name="company">
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail3">默认尺寸</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="size" name="size">
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">单价</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="price" name="price">
                      </div>

                    <div class="form-group">
                      <label>商品默认图片</label>
                     <input type="file" name='gpic' >

                    </div>

                   <div class="form-group">
                      <label>商品图片</label>
                     <input type="file" name='gimgs[]' multiple  >

                    </div>

                    <div class="form-group">
                      <label for="exampleInputCity1">库存量</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="stock" name="stock">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">简介</label>
                      <script id="editor" name='descript' type="text/plain" style="width:1145px;height:500px;"></script>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">状态</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="0" checked="">
                                新品
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="1">
                                上架
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
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
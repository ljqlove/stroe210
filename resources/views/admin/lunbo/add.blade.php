@extends('layout.admins')

@section('title',$title)

@section('content')

              <div class="card-body">
                  <h4 class="card-title">{{$title}}</h4><br>

                  @if (count($errors) > 0)
                  <div class="btn btn-block btn-lg btn-gradient-primary mt-4" id="xserror">
                          <p>显示错误信息</p>
                            <ul  style="list-style:none;">
                              @foreach ($errors->all() as $error)
                              <li style='font-size:20px' >{{$error}}</li>
                              @endforeach
                            </ul>
                        </div>
                  @endif
                  <br>

                 <form action="/admin/user" method="post" class="mws-form" enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="exampleInputUsername1">链接地址</label>
                      <input type="text" class="form-control" name="phone" placeholder="请输入链接地址">
                    </div>
                    <div class="form-group">
                      <label>图片</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">选择图片...</button>
                        </span>
                      </div>
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-gradient-primary btn-fw">提交</button>
                  </form>
              </div>
@stop

@section('js')
<script>
  $('#xserror').delay(2000).fadeOut(2000);
</script>
@stop
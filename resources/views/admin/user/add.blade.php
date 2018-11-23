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
                      <label for="exampleInputUsername1">手机号</label>
                      <input type="text" class="form-control" name="phone" placeholder="请输入手机号">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">密码</label>
                      <input type="password" class="form-control" name="password" placeholder="请输入密码">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">确认密码</label>
                      <input type="password" class="form-control" name="repass" placeholder="请输入确认密码">
                    </div>
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">权限</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option name="auth" value="2">会员</option>
                              <option name="auth" value="1">客户</option>
                              <option name="auth" value="0">超级管理员</option>
                            </select>
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
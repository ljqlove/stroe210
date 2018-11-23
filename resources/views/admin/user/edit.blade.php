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

                 <form action="/admin/user/{{$res->uid}}" method="post" class="mws-form" enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="exampleInputUsername1">手机号</label>
                      <input type="text" class="form-control" name="phone" value="{{$res->phone}}">
                    </div>
                    <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item clearfix">
                      <ul class="mws-form-list inline" style="list-style: none;">
                        <li><label><input type="radio" name='status' value="1" @if($res->status== 1) checked @endif>开启</label></li>
                        <li><label><input type="radio" name='status' value="0" @if($res->status== 0) checked @endif>禁用</label></li>
                      </ul>
                    </div>
                  </div>
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">权限</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option name="auth" value="2" @if($res->auth==2) checked @endif>会员</option>
                              <option name="auth" value="1" @if($res->auth==1) checked @endif>客户</option>
                              <option name="auth" value="0" @if($res->auth==0) checked @endif>超级管理员</option>
                            </select>
                          </div>
                    </div>
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="PUT">
                   <button type="submit" class="btn btn-gradient-primary btn-fw">提交</button>
                  </form>
              </div>
@stop

@section('js')
<script>
  $('#xserror').delay(2000).fadeOut(2000);
</script>
@stop
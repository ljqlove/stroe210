@extends('layout.admins')

@section('title',$title)

@section('content')
	<title>{{$title}}</title>


<div class="card-body">
                  <h4 class="card-title">添加分类</h4>
          
          <div class="content-wrapper">
          <!-- 显示错误信息 -->
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

          <!-- 类名 -->
                  <form action="/admin/category/{{$res->tid}}" method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">分类名</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="请输入类名" name='tname' value="{{$res->tname}}">
                    </div>

                    <!-- 父类 -->
                    <div class="form-group">
                      <label for="exampleFormControlSelect2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">顶级分类</font></font></label>

                      <select class="form-control" id="exampleFormControlSelect2" name="pid">
                        
                        <option value="0">请选择</option>

                        @foreach($rs as $v)
                         <option value='{{$v->id}}' @if($res->pid == $v->tid) selected @endif  >{{$v->tname}}</option>
                         @endforeach
                      </select>
            
                    </div>

                    <!-- 状态 -->
                    <div class="col-md-6">

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">状态</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="1" @if($res->status == 1) checked @endif  >开启<i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="0" @if($res->status == 0) checked @endif >关闭<i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>

                      </div>
                      {{csrf_field()}}
                      {{method_field('PUT')}}
                   <input name="_method" type="hidden" value="PUT">
                    <button type="submit" class="btn btn-gradient-danger btn-fw">修改</button>
                  </form>
                </div>
       </div>

@stop
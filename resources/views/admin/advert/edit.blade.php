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
                  <h4 class="card-title">广告修改页面</h4>
                  <p class="card-description">
                    edit advert
                  </p>

                  <form class="forms-sample" action="/admin/advert/{{$advert[0]['id']}}" method="post" class="mws-form" enctype='multipart/form-data'>

                    <div class="form-group">
                      <label for="exampleInputEmail3">广告名称</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="name" name="name" value="{{$advert[0]['name']}}">
                    </div>
                    
                    <div class="form-group">
                      <label>广告图片</label>
                     <input type="file" name='img' >
                     <img src="{{$advert[0]['img']}}" style="width: 50px;height: 50px;">
                    </div>

                     <div class="col-md-6">

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">状态</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="1" @if($advert[0]['status'] == 1) checked @endif  >开启<i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="0" @if($advert[0]['status'] == 0) checked @endif >禁用<i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>

                      </div>
                    
                    <button type="submit" class="btn btn-gradient-primary mr-2">提交</button>
                    {{csrf_field()}}

                    {{method_field('PUT')}}
                    <!-- <button class="btn btn-light">重置</button> -->
                  </form>
                </div>
    
</div>



@stop
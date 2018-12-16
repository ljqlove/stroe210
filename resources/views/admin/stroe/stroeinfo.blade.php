@extends('layout.admins')

@section('title',$title);

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    @php
        $uname = DB::table('message')->where('uid',$sinfo->uid)->first();
        if($sinfo->status == 1) {
            $na = $uname->uname."的店铺";
            $sub1 = "提交修改";
            $sub2 = "停歇店铺";
        } else {
            $na = $uname->uname."的申请";
            $sub1 = "同意申请";
            $sub2 = "申请不通过";
        }
    @endphp

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
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body" style="margin-left:20px">
                  <h4 class="card-title">{{$na}}</h4>
                  <p class="card-description">
                    {{$sinfo->create_at}}
                  </p>
                  <form class="forms-sample" id="art_form" action="/admin/stroe" method="post" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputName1">店铺名</label>
                      <input type="text" class="form-control asd"  name="company" value="{{$sinfo->company}}">
                      <input type="hidden" class="form-control asd"  name="id" value="{{$sinfo->id}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">掌柜</label>
                      <input type="text" class="form-control asd"  name="uname" value="{{$sinfo->uname}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">联系电话</label>
                      <input type="text" class="form-control asd"  name="iphone" value="{{$sinfo->iphone}}">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" value="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div> -->
                    <div class="form-group"  style="position: relative;">
                      <label for="exampleInputCity1">店铺简图(1200X315)</label>
                      <img src="{{$sinfo->image}}" id='imgs' width="570" height="150"  alt="" style="cursor:pointer">
                      <input type="file" name="image" id="file_upload" multiple style="position:absolute;top:0px;left:60px;font-size:100px;width:150px;cursor: pointer;opacity: 0;z-index: 999;">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div> -->
                    <button type="submit" class="btn btn-gradient-primary mr-2">{{$sub1}}</button>
                    <a  href="/admin/stroesub2/{{$sinfo->id}}" class="btn btn-gradient-info sub2">{{$sub2}}</a>
                    @if($sinfo->status == 2)
                    <script>

                        $('.sub2').hide();

                    </script>
                    @endif
                    <script>
                        var aa = $('#file_upload')[0].files[0];
                        console.log(aa);
                        $(function () {
                            $("#file_upload").change(function () {
                                var imgPath = $("#file_upload").val();

                              if (imgPath == "") {
                                  alert("请选择上传图片！");
                                  return;
                              }
                              //判断上传文件的后缀名
                              var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                              if (strExtension != 'jpg' && strExtension != 'gif'
                                  && strExtension != 'png' && strExtension != 'jpeg') {
                                  alert("请选择图片文件");
                                  return;
                              }
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                              var fd = new FormData();
                              fd.append("image", $('#file_upload')[0].files[0]);
                              console.log(fd);
                              $.ajax({
                                type: "post",
                                url: "/admin/ajaxstroe/{{$sinfo->id}}",
                                data: fd,
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    $('#imgs').attr('src',data);
                                      // console.log(data);
                                },
                                error: function(data) {
                                    alert("上传失败，请检查网络后重试");
                                }
                            });

                            })
                        })
                    </script>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
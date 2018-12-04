<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{$title}}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/admins/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/admins/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/admins/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/admins/images/favicon.png" />
</head>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="../../images/logo.svg">
              </div>
              <form class="pt-3" action="/admin/dologin" method="post">
                  @if(session('error'))
                    <div class="btn btn-block btn-lg btn-gradient-primary mt-4" >
                    <li style="list-style:none;">{{session('error')}}</li>
                    </div>
                  @endif
                  <br>
                <div class="form-group">
                  <input type="phone" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="请输入手机号" name="phone">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="请输入密码" name="password"> 
                </div>
                <div class="form-group">
                  <input type="text" class="form-control pull-left" placeholder="请输入验证码" name="code" style="width:170px"><img class="pull-right" style="height:80px" src="/admin/captcha" alt="" onclick='this.src=this.src+="?1"'>
                </div>
                {{csrf_field()}}
                <div class="mt-3">
                  <input type="submit" value="登录" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                </div>
                
                <div class="text-center mt-4 font-weight-light">
                  没有账号? 请<a href="" class="text-primary">联系管理员</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/admins/vendors/js/vendor.bundle.base.js"></script>
  <script src="/admins/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/admins/js/off-canvas.js"></script>
  <script src="/admins/js/misc.js"></script>
  <!-- endinject -->
</body>
</html>
@section('js')
<script>
  $('#xserror').delay(2000).fadeOut(2000);
</script>
@stop
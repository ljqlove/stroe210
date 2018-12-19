<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
  <script src='/bs/js/jquery.min.js'></script>
  <script src='/bs/js/bootstrap.min.js'></script>

  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/admins/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/admins/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/admins/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/admins/images/favicon.png" />

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="/admin"><img src="/admins/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="/admin"><img src="/admin" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              @php
                  $data =session()->all();
              @endphp
              <div class="nav-profile-img">
                <img src="
                @if($data['user_pic'])
                {{$data['user_pic']}}
                @endif
                " alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">
                @if($data['user_name'])
                {{$data['user_name']}}
                @endif
              </p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/admin/logout">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                退出
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          @php
            $rs = DB::table('blog_user')->where('user_id',session('uid'))->first();
            $es = DB::table('blog_role_user')->where('user_id',$rs->user_id)->first();
          @endphp
          @if($es->role_id == 1)
          <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count-symbol bg-danger aa"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
               @php
                $news = DB::table('stores')->where('status','0')->get();
                if(!empty($news)){
                  $st = 1;
                } else {
                  $st = 0;
                }
              @endphp
              <h6 class="p-3 mb-0 bb" st = "{{$st}}">新的申请信息</h6>

              @foreach($news as $v)
              @php
                $res = DB::table('message')->where('uid',$v->uid)->first();
              @endphp
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{$res->headpic}}" alt="image" class="profile-pic asd" style="cursor:pointer" sid="{{$v->id}}">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal asd" style="cursor:pointer" sid="{{$v->id}}">{{$res->uname}}@的申请</h6>
                  <p class="text-gray mb-0">
                    @php
                      $rs = (time() - strtotime($v->create_at))/60;
                      if($rs < 60){
                      echo ceil($rs)." Minutes ago ";
                    } else if(($rss = $rs/60) < 60) {
                      echo ceil($rss)." Hours ago ";
                    } else if(($rsss = $rss/24)) {
                      echo ceil($rsss)." Days ago ";
                    } else if(($rssss = $rsss/30)) {
                      echo ceil($rssss)." Month ago ";
                    } else if(($rsssss = $rssss/12)) {
                      echo ceil($rsssss)."Year ago";
                    }
                    @endphp
                  </p>
                </div>
              </a>
              @endforeach
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">{{count($news)}} new messages</h6>
            </div>
            <script>
              var st = $('.bb').attr('st');
              if (st) {
                setInterval(function(){
                  $('.aa').toggle();
                },1000);
              } else {
                $('.aa').hide();
              }
              $('.asd').click(function(){
                var id = $(this).attr('sid');
                console.log(id);
                location.href = '/admin/stroe/'+id;
              })
            </script>
          </li>
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                  <p class="text-gray ellipsis mb-0">
                    Just a reminder that you have an event today
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                  <p class="text-gray ellipsis mb-0">
                    Update dashboard
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                  <p class="text-gray ellipsis mb-0">
                    New admin wow!
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">See all notifications</h6>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-guan" aria-expanded="false" aria-controls="ui-guan">
              <span class="menu-title">管理员管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account-key menu-icon"></i>
            </a>
            <div class="collapse" id="ui-guan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/blog_roles">角色管理</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/blog_permissions">权限管理</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/blog_user">管理员列表</a></li>
                </ul>
            </div>
          </li>

         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-hui" aria-expanded="false" aria-controls="ui-hui">
              <span class="menu-title">会员管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account-key menu-icon"></i>
            </a>
            <div class="collapse" id="ui-hui">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/user/create">会员添加</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/user">会员列表</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/message">客户列表</a></li>
                </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-wsx" aria-expanded="false" aria-controls="ui-wsx">
              <span class="menu-title">商品评价管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-wsx">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/comment">浏览评价</a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">分类管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-file-document-box"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/category/create">添加类别</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/category">浏览类别</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-order" aria-expanded="false" aria-controls="ui-order">
              <span class="menu-title">订单管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-order">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/order">订单列表</a></li>
                </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-stroe" aria-expanded="false" aria-controls="ui-stroe">
              <span class="menu-title">商家管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-home-modern menu-icon"></i>
            </a>
            <div class="collapse" id="ui-stroe">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/stroe">商家列表</a></li>
                </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-asd" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">友情链接</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-access-point-network"></i>
            </a>
            <div class="collapse" id="ui-asd">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/firend">链接列表</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-abc" aria-expanded="false" aria-controls="ui-abc">
              <span class="menu-title">商品管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-cart-outline"></i>
            </a>
            <div class="collapse" id="ui-abc">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/goods/create">添加商品</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/goods">浏览商品</a></li>
               </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-flash" aria-expanded="false" aria-controls="ui-flash">
              <span class="menu-title">快讯管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-cart-outline"></i>
            </a>
            <div class="collapse" id="ui-flash">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/flash/create">添加快讯</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/flash">浏览快讯</a></li>
               </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-azx" aria-expanded="false" aria-controls="ui-azx">
              <span class="menu-title">轮播图管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-book-open-page-variant"></i>
            </a>
            <div class="collapse" id="ui-azx">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/lunbo/create">添加轮播图</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/lunbo">浏览轮播图</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-zhan" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">系统设置</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi mdi-wrench"></i>
            </a>
            <div class="collapse" id="ui-zhan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/site">站点设置</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/system">系统日志</a></li>
              </ul>
            </div>
          </li>

               <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-guang" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">广告管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi mdi-wrench"></i>
            </a>
            <div class="collapse" id="ui-guang">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/advert">设置广告</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
      <!-- partial -->

      <div class="main-panel">

      @yield('content')


        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="" target="_blank">BootstrapDash</a>. All rights reserved. </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/admins/vendors/js/vendor.bundle.base.js"></script>
  <script src="/admins/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/admins/js/off-canvas.js"></script>
  <script src="/admins/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/admins/js/dashboard.js"></script>
  <script src="/admins/js/file-upload.js"></script>

  @section('js')


  <!-- End custom js for this page-->
<script>
  $('#mr-2').delay(2000).fadeOut(2000);
  $('#mt-4').delay(2000).fadeOut(2000);
</script>
@stop
</body>

</html>

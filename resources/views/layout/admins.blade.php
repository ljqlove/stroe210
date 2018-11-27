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
        <a class="navbar-brand brand-logo" href="index.html"><img src="/admins/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/admins/images/logo-mini.svg" alt="logo"/></a>
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
              <div class="nav-profile-img">
                <img src="/admins/images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">管理员</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="/admin/order">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                活动日志
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
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
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count-symbol bg-warning"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="/admins/images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                  <p class="text-gray mb-0">
                    1 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="/admins/images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                  <p class="text-gray mb-0">
                    15 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="/admins/images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                  <p class="text-gray mb-0">
                    18 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">4 new messages</h6>
            </div>
          </li>
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
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="/admins/images/faces/face1.jpg" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">超级管理员</span>
                <span class="text-secondary text-small">Project Manager</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin">
              <span class="menu-title">首页</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-qaz" aria-expanded="false" aria-controls="ui-qaz">
              <span class="menu-title">会员信息管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>

            <div class="collapse in" id="ui-qaz" aria-expanded="false" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/user/create">添加会员</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/user">浏览会员</a></li>
                </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-wsx" aria-expanded="false" aria-controls="ui-wsx">
              <span class="menu-title">商品评价管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse in" id="ui-wsx" aria-expanded="false" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/comment">浏览评价</a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">分类管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-file-document-box"></i>
            </a>
            <div class="collapse in" id="ui-basic" aria-expanded="false" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/category/create">添加类别</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/category">浏览类别</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-order" aria-expanded="false" aria-controls="ui-order">
              <span class="menu-title">订单管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi  mdi-certificate menu-icon"></i>
            </a>
            <div class="collapse in" id="ui-order"  aria-expanded="false" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/order">订单列表</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-asd" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">友情链接</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-access-point-network"></i>
            </a>
            <div class="collapse in" id="ui-asd"  aria-expanded="false" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/firend/create">添加链接</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/firend">链接列表</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-abc" aria-expanded="false" aria-controls="ui-abc">
              <span class="menu-title">商品管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-cart-outline"></i>
            </a>
            <div class="collapse in" id="ui-abc" aria-expanded="false" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/goods/create">添加商品</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/goods">浏览商品</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ui-azx" aria-expanded="false" aria-controls="ui-azx">
              <span class="menu-title">轮播图管理</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-book-open-page-variant"></i>
            </a>
            <div class="collapse in" id="ui-azx" aria-expanded="false" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/lunbo/create">添加轮播图</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/lunbo">浏览轮播图</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item collapsed">
            <a class="nav-link" data-toggle="collapse" href="#ui-abs" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">客户信息</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account-card-details""></i>
            </a>
            <div class="collapse in" id="ui-abs" aria-expanded="false" style="">
              <ul class="nav flex-column sub-menu">
                <!-- <li class="nav-item"> <a class="nav-link" href="/admin/message/create">添加客户</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="/admin/message">客户详情</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
      <!-- partial -->

      <div class="main-panel">

      @section('content')






      @show


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

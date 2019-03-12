<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
  <title>ADMIN</title>
  <link href="{{ asset('public/admin_asset/asset/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="{{ asset('public/admin_asset/asset/css/style.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script type="text/javascript" src="{{ asset('public/admin_asset/asset/js/jquery.min.js')}}"></script>


  

</head>

<body>
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="#">Quản Lý Nhân Sự</a>
          <div id="close-sidebar">
            <i class="fas fa-times"></i>
          </div>
        </div>
        @include('admin.includes.header')
        <!-- sidebar-header  -->
        <div class="sidebar-search">
          <div>
            <div class="input-group">
              <input type="text" class="form-control search-menu" placeholder="Search...">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- sidebar-search  -->

        @include('admin.layouts.menu') 
        
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer">
        <a href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
          <i class="fa fa-envelope"></i>
          <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="#">
          <i class="fa fa-cog"></i>
          <span class="badge-sonar"></span>
        </a>

        <a href="{{ route('admin.getLogout') }}" title="logout">
          <i class="fa fa-power-off"></i>
        </a>
      </div>
    </nav>

    <main class="page-content">
    <!-- sidebar-wrapper  -->
        @yield('content')
    <!-- page-content" -->

   </main>
    
  </div>
  <!-- page-wrapper -->
  <script type="text/javascript" src="{{ asset('public/admin_asset/asset/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('public/admin_asset/asset/js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/admin_asset/asset/js/myjs.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!--   <script type="text/javascript">
     $(document).on('click', '.create-modal', function () {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Post');
      });

  </script> -->
</body>



</html>
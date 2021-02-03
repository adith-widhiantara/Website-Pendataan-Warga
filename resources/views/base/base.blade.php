<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') | Desa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

  @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
      @include('base.component.navbar')
    <!-- end navbar -->

    <!-- Main Sidebar Container -->
      @include('base.component.sidebar')
    <!-- end Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- breadcrumb -->
        @yield('breadcrumb')
      <!-- end breadcrumb -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- content -->
            @yield('base')
          <!-- end content -->
        </div>
      </section>
      <!-- end Main content -->
    </div>
    <!-- end Content Wrapper. Contains page content -->

    <!-- footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2021.</strong>
        All rights reserved.
      </footer>
    <!-- end footer -->
  </div>

  <!-- jQuery -->
  <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>

  @yield('script')
</body>
</html>

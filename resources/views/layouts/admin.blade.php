<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ARD Bali | Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome (AdminLTE 3 compatible) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.39.0/build/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css">
    <!-- AdminLTE Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/css/OverlayScrollbars.min.css">
  
    <!-- Custom CSS untuk Sidebar Full Height -->
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      .wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }

      /* Sidebar Full Height Fix */
      .main-sidebar {
        position: fixed !important;
        top: 0 !important;
        bottom: 0 !important;
        left: 0 !important;
        min-height: 100vh !important;
        height: 100vh !important;
        overflow: hidden;
      }

      .sidebar {
        height: calc(100vh - 57px) !important;
        overflow-y: auto !important;
        overflow-x: hidden;
        padding-bottom: 30px;
      }

      /* Custom Scrollbar */
      .sidebar::-webkit-scrollbar {
        width: 6px;
      }

      .sidebar::-webkit-scrollbar-track {
        background: #2c3b41;
      }

      .sidebar::-webkit-scrollbar-thumb {
        background: #4b545c;
        border-radius: 3px;
      }

      .sidebar::-webkit-scrollbar-thumb:hover {
        background: #6c757d;
      }

      /* Ensure brand logo doesn't scroll */
      .brand-link {
        position: sticky;
        top: 0;
        z-index: 1;
        background: #343a40;
      }

      /* Adjust content wrapper */
      .content-wrapper {
        min-height: 100vh;
      }
    </style>

  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @yield('content')
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<!-- Sparkline -->
<script src="https://cdn.jsdelivr.net/npm/sparklines/source/sparkline.js"></script>
<!-- JQVMap -->
<script src="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jquery.vmap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob -->
<script src="https://cdn.jsdelivr.net/npm/jquery-knob@1.2.13/dist/jquery.knob.min.js"></script>
<!-- Moment.js -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<!-- Daterangepicker -->
<script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1/daterangepicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.39.0/build/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
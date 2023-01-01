<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('css/fonts/fontawesome/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard/css/adminlte.min.css') }}">
</head>
<body class="dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">
    <x-dashboard.layouts.nav></x-dashboard.layouts.nav>

    <x-dashboard.layouts.sidebar></x-dashboard.layouts.sidebar>

    <x-dashboard.layouts.main>
      {{ $slot }}
    </x-dashboard.layouts.main>

    <x-dashboard.layouts.footer></x-dashboard.layouts.footer>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('dashboard/js/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('dashboard/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dashboard/js/adminlte.min.js') }}"></script>
</body>
</html>

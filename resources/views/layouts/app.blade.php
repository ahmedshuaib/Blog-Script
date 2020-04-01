<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} - @yield('pageTitle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href={{ asset("plugins/fontawesome-free/css/all.min.css") }}>
    <link rel="stylesheet" href={{ asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/jqvmap/jqvmap.min.css") }}>
    <link rel="stylesheet" href={{ asset("dist/css/master.min.css") }}>
    <link rel="stylesheet" href={{ asset("dist/css/style.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/select2/css/select2.min.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/daterangepicker/daterangepicker.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/summernote/summernote-bs4.css") }}>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('dashboard.inc.navigation')
    @include('dashboard.inc.sidebar')
    <div class="content-wrapper">
        @include('dashboard.inc.page-header')
        <section class="content">
            <div class="container-fluid">
                @include('dashboard.inc.message')
                @yield('content')
            </div>
        </section>
    </div>
    @include('dashboard.inc.footer')
</div>

<script src={{ asset("plugins/jquery/jquery.min.js") }}></script>
<script src={{ asset("plugins/jquery-ui/jquery-ui.min.js") }}></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
<script src={{ asset("plugins/select2/js/select2.full.min.js") }}></script>

<script src={{ asset("plugins/chart.js/Chart.min.js") }}></script>
<script src={{ asset("plugins/sparklines/sparkline.js") }}></script>
<script src={{ asset("plugins/jqvmap/jquery.vmap.min.js") }}></script>
<script src={{ asset("plugins/jqvmap/maps/jquery.vmap.usa.js") }}></script>
<script src={{ asset("plugins/jquery-knob/jquery.knob.min.js") }}></script>
<script src={{ asset("plugins/moment/moment.min.js") }}></script>
<script src={{ asset("plugins/daterangepicker/daterangepicker.js") }}></script>
<script src={{ asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}></script>
<script src={{ asset("plugins/summernote/summernote-bs4.min.js") }}></script>
<script src={{ asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
<script src={{ asset("dist/js/adminlte.js") }}></script>
<script src={{ asset("plugins/datatables/jquery.dataTables.js") }}></script>
<script src={{ asset("plugins/datatables-bs4/js/dataTables.bootstrap4.js") }}></script>

<script>
    const url = window.location;
    $('ul.nav-sidebar a').removeClass('active').parent().siblings().removeClass('menu-open');
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active').closest(".has-treeview").addClass('menu-open').find("> a").addClass('active');
</script>
@yield('script')

</body>
</html>

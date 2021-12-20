<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ $default->meta_keywords }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="all,index,follow,snippet,archive,odp">
    <meta name="title" content=" @yield('meta-title')" />
    <meta name="description" content="@yield('meta-description'), {{ $default->meta_description }}" />
    <title>@yield('pageTitle')-{{ config('app.name') }}</title>
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navy.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href={{ asset('css/all.css') }}>
    <link rel="stylesheet" href={{ asset('css/fontawesome.css') }}>
</head>

<body>
    @include('inc.header')
    @yield('content')
    @include('inc.footer')
    <script src={{ asset("plugins/jquery/jquery.min.js") }}></script>
    <script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    @yield('script')

    <script>
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
            }
            var $subMenu = $(this).next('.dropdown-menu');
            $subMenu.toggleClass('show');


            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass('show');
            });


            return false;
        });
    </script>
</body>

</html>

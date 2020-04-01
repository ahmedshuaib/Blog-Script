<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Easy Firmware BD') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href={{ asset("plugins/fontawesome-free/css/all.min.css") }}>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href={{ asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("dist/css/master.min.css") }}>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">


<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}">
            <h2 class="text-success mt-5 border-5px-radius"><b><i>Easy</i> <span class="text-dark">Firmware</span> <span class="text-red">BD</span></b></h2>
        </a>
    </div>
    @yield('content')
</div>

<script src={{ asset("plugins/jquery/jquery.min.js") }}></script>
<script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
<script src={{ asset("dist/js/adminlte.min.js") }}></script>

</body>
</html>

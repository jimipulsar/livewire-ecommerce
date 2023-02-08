<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard | {{ config('app.name', 'Livewire ') }}</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <link rel="stylesheet" href="/assets/css/customX.css">
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/vendor/animate.css/animate.min.css">

</head>
<body>

<x-alert-admin></x-alert-admin>
<x-success-admin></x-success-admin>
<main>
        @yield('content')

</main>
<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>
<script>
    $(window).on('load', function () {
        setTimeout(function () {
            $('#hideMeBack').fadeOut()
        }, 6000);
    });
</script>
</body>
</html>

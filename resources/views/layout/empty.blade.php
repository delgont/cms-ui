<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('stephendevs/lad/img/favicon.png') }}" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        <!-- Styles -->
        <link href="{{ asset('css/delgont.css') }}" rel="stylesheet">
        @yield('requiredCss')
        <!-- Scripts -->
        <script src="{{ asset('js/delgont.js') }}" defer></script>



    </head>
    <body class="empty">
        @yield('content')
    </body>

</html>

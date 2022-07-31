<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Nunito') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css') }}">
    <link id="pagestyle" href="{{ asset('frontend/css/material-dashboard.css') }}" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('layouts.inc.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.inc.navbar')
        <div class="container-fluid py-4">
            @yield('content')


            @include('layouts.inc.footer')
        </div>

    </main>


    <!-- Scripts -->
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('frontend/js/material-dashboard.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
</body>

</html>

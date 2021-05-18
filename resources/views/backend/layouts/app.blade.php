<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>

    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('argon') }}/css/sweetalert2.min.css">


    <style>
        .main-content {
            height: 100vh;
        }

    </style>
    @include('sweetalert::alert')
</head>

<body class="{{ $class ?? '' }}">
    @if(auth('super_admin')->check() || auth('web')->check())
    <form id="logout-form" action="{{ route('do.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @include('backend.layouts.navbars.sidebar')
    @endif

    <div class="main-content">
        @include('backend.layouts.navbars.navbar')
        @yield('content')
    </div>

    <!-- Main Modal Content for All Pages Start -->
    <div class="modal fade bd-example-modal-lg" id="modal1" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <!-- Main Modal Content for All Pages End -->

    @guest()
    {{-- @include('backend.layouts.footers.guest') --}}
    @endguest

    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    @stack('js')

    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    <script src="{{ asset('argon') }}/js/ajax_form_submit.js"></script>
    <script src="{{ asset('argon') }}/js/custom_script.js"></script>
    <!-- Sweet Alert JS -->
    <script src="{{ asset('argon') }}/js/sweetalert2.min.js"></script>

</body>

</html>

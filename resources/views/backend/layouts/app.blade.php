<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>

    {{-- CSS Files --}}
    @include('backend.layouts.includes.css')

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

    {{-- Include JS Files --}}
    @include('backend.layouts.includes.js')

</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 3'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    @if(! config('adminlte.enabled_laravel_mix'))
    <link rel="stylesheet" href="{{ asset('public/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">

    @include('adminlte::plugins', ['type' => 'css'])

    @yield('adminlte_css_pre')

    @yield('adminlte_css')


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @else

    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    @endif



</head>
<body class="@yield('classes_body')" @yield('body_data')>



@yield('body')

@if(! config('adminlte.enabled_laravel_mix'))
<script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
<!-- for dropdown -->
<script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- for summernote -->
<script src="{{ asset('public/vendor/summernote/summernote-bs4.min.js') }}"></script>

@include('adminlte::plugins', ['type' => 'js'])

@yield('adminlte_js')

@else
<script src="{{ asset('public/js/app.js') }}"></script>
@endif

</body>
</html>

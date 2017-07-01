<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}">
    @yield('styles')
</head>
<body>

@include('backend.partials.nav')

@yield('content')

<script type="text/javascript" src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendor/bootstrap/js/bootstrap.min.js') !!}"></script>

@yield('scripts')
</body>
</html>
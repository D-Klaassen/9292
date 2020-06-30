<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<body>
@include('includes.header')
<main>

    @include('includes.error')
    @yield('content')
</main>
</body>
</html>

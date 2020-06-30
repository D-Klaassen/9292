<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<body>
@include('includes.header')
<main>
    @yield('content')
</main>
</body>
</html>

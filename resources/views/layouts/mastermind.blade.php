<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project | @yield('title')</title>
    @yield('extracss')
    @yield('extrascript')
</head>
<body>
<x-navigation></x-navigation>
@yield('assets')
</body>
</html>

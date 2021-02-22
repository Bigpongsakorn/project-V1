<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>
    @include('layouts.file.header')
</head>

<body>

    @yield('content')
    
    @include('layouts.file.footer')

</body>

</html>

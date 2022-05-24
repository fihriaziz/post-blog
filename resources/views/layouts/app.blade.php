<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>
<body>
    <main class="p-5">@yield('content')</main>

    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>
</html>

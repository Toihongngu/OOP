<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <title>@yield('title')</title>

    @include('layouts.partials.head')
</head>

<body>

    @include('layouts.partials.topbar')

    @include('layouts.partials.navbar')

    @yield('content')

    @include('layouts.partials.footer')

    @include('layouts.partials.script')
</body>

</html>

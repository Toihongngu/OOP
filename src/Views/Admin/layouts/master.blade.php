<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 07:23:13 GMT -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>

    @include('layouts.partials.head')
</head>

<body class="crm_body_bg">


    @include('layouts.partials.nav')
    {{-- @include('layouts.partials.topbar') --}}
    <section class="main_content dashboard_part large_header_bg">
        @include('layouts.partials.headertop')
        @yield('content')

        @include('layouts.partials.footer')

        <div id="back-top" style="display: none;">
            <a title="Go to Top" href="#">
                <i class="ti-angle-up"></i>
            </a>
        </div>
    </section>
    @include('layouts.partials.script')

    @yield('script')
</body>

</html>

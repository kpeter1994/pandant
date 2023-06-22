<!doctype html>
<html lang="hu">
<head>
    @include('partials._head')
</head>
<body class="hold-transition sidebar-mini layout-fixed dark-mode" data-panel-auto-height-mode="height">
    <div class="wrapper">
        @include('partials._nav')


                @yield('content')




    @include('partials._footer')
    </div>
    @include('partials._scripts')
</body>
</html>

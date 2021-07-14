<html lang="en">
<head>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<head>
    @include('layouts.backend.header')
</head>

<body>
    {{-- sweet alert --}}
    @include('sweet::alert')
    <!-- Left Panel -->

    @include('layouts.backend.sidebar')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
       @include('layouts.backend.navbar')
        <!-- /#header -->
        <!-- Content -->
        @yield('content')
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
       @include('layouts.backend.footer')
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    {{-- @include('layouts.backend.reset-password') --}}
    <!-- Scripts -->
    @include('layouts.backend.footer-script')
</body>
</html>

<!doctype html>

<head>
    @include('includes.head')
</head>

<body>
    <div id="app" class="container-fluid d-flex">
        <div class="col-3">
            <!--Header dashboard -->
            @include('includes.header_dashboard')
            <!--Loader-->
            @include('includes.menu_loader')
            <!--Sidebar-->
            @include('includes.sidebar')
        </div>
        <div class="col-9">
            @yield('content')
        </div>
    </div>
    @include('includes.footer')
</body>

</html>

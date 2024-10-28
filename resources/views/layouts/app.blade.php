<!doctype html>

<head>
    @include('includes.head')
</head>

<body>
    <div id="app" class="overflow-x-hidden">
        <div class="row">
            <div class="col-2">
                <!--Sidebar-->
                @include('includes.sidebar')
            </div>
            <div class="col-10">
                <!--Header dashboard -->
                @include('includes.header_dashboard')
                <!--Loader-->
                @include('includes.menu_loader')
                @yield('content')
            </div>
        </div>
    </div>
    @include('includes.footer')
</body>

</html>

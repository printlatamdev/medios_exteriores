<!doctype html>
<head>
    @include('includes.head')
</head>
<body>
    <div id="app">
        <!--Header dashboard -->
        @include('includes.header_dashboard')
        <!--Loader-->
        @include('includes.menu_loader')
        <!--Sidebar-->
        @include('includes.sidebar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

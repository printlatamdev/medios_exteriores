<!doctype html>

<head>
    @include('includes.head')
</head>

<body style=" background: #F5F5F7">
    <div id="app" class="overflow-x-hidden">
        <div class="row">
            <div class="mainSidebar">
                <!--Sidebar-->
                @include('includes.sidebar')
            </div>
            <div class="mainContent">
                <!--Header dashboard -->
                @include('includes.header_dashboard')
                <!--Loader-->
                @include('includes.menu_loader')
               <div class="p-25 ">
                    @yield('content')
               </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</body>

</html>

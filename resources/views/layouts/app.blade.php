<!doctype html>

<head>
    @include('includes.head')
</head>

<body style=" background: #F5F5F7">
    <div id="app" class="overflow-x-hidden">
        <div class="row">
            <div class="col-xl-2 col-md-2 d-none d-lg-block p-0">
                <!--Sidebar-->
                @include('includes.sidebar')
            </div>
            <div class="col-xl-10 col-md-10 col-sm-12 px-0">
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

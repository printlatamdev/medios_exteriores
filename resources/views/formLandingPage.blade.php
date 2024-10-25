<!DOCTYPE html>
<html lang="es">
<head>
  @include('includes.head')
  @yield('linkForm')
</head>
<body>
  @include('includes.header')
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
@include('includes.footer')
</html>

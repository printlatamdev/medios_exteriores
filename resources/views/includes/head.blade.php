<title>Medios exteriores - @yield('title')</title>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Lorem ipsum">
<meta name="keywords" content="lorem, ipsum">
<meta name="author" content="Color Digital">

<!-- Favicon icon -->
<link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('vendorSystemFile/css/app.css') }}">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- PARA SELECCION MULTIPLE, ESTILO -->
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css"
    rel="stylesheet" />
<!-- Font Awesome v 6.1.2   -->
<link href="{{ asset('vendorSystemFile/fontawesome-free-6.1.2-web/css/all.css') }}" rel="stylesheet">
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

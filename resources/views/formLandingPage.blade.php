<!DOCTYPE html>
<html lang="es">
<head>
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
  <link href="{{  asset('vendorSystemFile/bootstrap/v5.2.x/bootstrap.min.css')  }}" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="{{  asset('vendorSystemFile/bootstrap/v5.2.x/bootstrap.bundle.min.js')  }}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- SELECT CON BUSCAR INTEGRADO -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- PARA SELECCION MULTIPLE, ESTILO -->
  <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" /> 
  <!-- Font Awesome v 6.1.2   -->
  <link href="{{  asset('vendorSystemFile/fontawesome-free-6.1.2-web/css/all.css') }}" rel="stylesheet">
  @yield('linkForm')
</head>
<body>
    <!-- delay1 -->
    <nav class="logo-imagen navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
             <img class="logo-image-navbar" src="{{  asset('vendorSystemFile/image/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"></a>
            </li>
          </ul>
          <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="{{route('login')}}"><i class="fa-solid fa-house-circle-check"></i>&nbsp;Inicio</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="{{route('registro.index')}}" class="btn btn-info my-2 my-sm-0"><i class="fa-solid fa-restroom"></i>&nbsp;Registro&nbsp;&nbsp;</a>
                   </li>
                </ul>
          </form>
        </div>
      </div>
    </nav>

    <div class="container">
        <div class="row">

            @yield('content')
        </div>
    </div>

<!-- Required Js -->
<!-- <script src="{{  asset('assets/js/vendor-all.min.js')        }}"></script> -->
<!-- <script src="{{  asset('assets/js/plugins/bootstrap.min.js') }}"></script> -->
<!-- <script src="{{  asset('assets/js/plugins/feather.min.js')   }}"></script> -->
<!-- <script src="{{  asset('assets/js/pcoded.min.js')            }}"></script>  -->

<!-- JQUERY -->
<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/jquery/jquery-3.6.1.min.js') }}"></script>
<!-- <script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/jquery/jquery-3.5.1.min.js') }}"></script> -->
<!-- <script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/jquery/jquery-3.4.1.min.js') }}"></script> -->
<!-- JS AGREGADOS POREL PROGRAMADOR -->
<script src="{{  asset('vendorSystemFile/js/jsProcesosEstandar.js')  }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- SELECT CON BUSCAR INTEGRADO -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	setUrlBase("{{$urlJs}}");
</script>
</body>
</html>

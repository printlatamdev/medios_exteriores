<!DOCTYPE html>
<html lang="en">

<head>

	<title>DashboardKit, @yield('title')</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="DashboardKit is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
	<meta name="keywords" content="DashboardKit, Dashboard Kit, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Free Bootstrap Admin Template">
	<meta name="author" content="DashboardKit ">


	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

	<!-- font css -->
	<!-- <link rel="stylesheet" href="{{  asset('assets/fonts/feather.css')     }}">
	<link rel="stylesheet" href="{{  asset('assets/fonts/fontawesome.css') }}">
	<link rel="stylesheet" href="{{  asset('assets/fonts/material.css')    }}">  -->

	<!-- vendor css, bootstrap plantia -->
	<!-- <link rel="stylesheet" href="{{  asset('assets/css/style.css')        }}" id="main-style-link"> -->

    <!-- BOOTSTRAP 5.2.X -->
    <!-- CSS only -->
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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');
        body {
               /* background: url("<?=''//base_url('assets/image/fondo.png');?>") no-repeat center top fixed; */
               background: #DFDEDE no-repeat center center fixed;
               /* padding-top: 100px !important; */
               -webkit-background-size: cover;
               -moz-background-size: cover;
               -o-background-size: cover;
               background-size: cover;
        }  
        .navbar {
           opacity: 1.0;
        } 
        .logo-imagen {
          /* margin: 0px !important;
          padding: 0px !important;
          border: 0px !important; */
          background-color: #045aa0 !important;
        }
        .logo-image-navbar{
           width: 200px; 
           height: 35px; 
           margin: 0; 
           padding:0;
        }
        .color-letra-menu{
          color: white;
        }
        .contenedor{         
          /* background-color: #000000; */
          /* opacity: 0.8; */
          /* background-color: rgba(28, 67, 98, 0.5);/* Color semi transparente */

          padding: 0px;

          -moz-border-radius: 3px 3px 3px 3px;
          -webkit-border-radius: 3px 3px 3px 3px;
          border-radius: 3px 3px 3px 3px;
          behavior:url(border.htc);

          box-shadow: 0px 0px 12px #000000;
          -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=12, Direction=135, Color=#000000)'; 
          filter: progid:DXImageTransform.Microsoft.Shadow(Strength=12, Direction=135, Color='#000000');
          
          margin-right: 0px;
          margin-left: 0px;

          padding-left: 10px;
          padding-right: 10px;
        }
        /* @media screen and (max-width:991px){
            .cuerpo{
               text-align:left;
            }
        }    */
   
        /* @media screen and (max-width:397px){
            .logo-image-navbar{
               width: 250px; 
               height: 40px;  
               margin: 0; 
               padding:0;
            }
        } */
    </style>

</head>
<body>

<!-- [ auth-signin ] start -->


    <!-- delay1 -->
    <nav class="logo-imagen navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
             <img class="logo-image-navbar" src="{{  asset('vendorSystemFile/image/logo.png') }}" class="img-fluid" >
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
    
<!-- [ auth-signin ] end -->

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
    // $("body").append('<div class="fixed-button active"><a href="https://gumroad.com/dashboardkit" target="_blank" class="btn btn-md btn-success"><i class="material-icons-two-tone text-white">shopping_cart</i> Upgrade To Pro</a> </div>');
	setUrlBase("{{$urlJs}}");
</script>

</body>

</html>

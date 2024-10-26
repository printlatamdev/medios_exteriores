<!DOCTYPE html>
<html lang="en">

<head>
    <title>DashboardKit, @yield('title')</title>
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
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css')      }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css')     }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
	<!-- Font Awesome v 6.1.2   -->
    <link href="{{ asset('vendorSystemFile/fontawesome-free-6.1.2-web/css/all.css') }}" rel="stylesheet">
	<!-- SELECT CON BUSCAR INTEGRADO -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- PARA SELECCION MULTIPLE, ESTILO -->
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="assets/images/logo.svg" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<a href="#!" class="pc-head-link" id="headerdrp-collapse">
				<i data-feather="align-right"></i>
			</a>
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<!-- MENU LATERAL -->
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="index.html" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="assets/images/logo.svg" alt="" class="logo logo-lg">
					<img src="assets/images/logo-sm.svg" alt="" class="logo logo-sm">
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">

					<li class="pc-item pc-caption">
						<label>Navigation</label>
					</li>
					<li class="pc-item">
						<a href="index.html" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">home</i></span><span class="pc-mtext">Dashboard</span></a>
					</li>
					 <li class="pc-item pc-caption">
						<label>cPanel</label>
						<span>TIC's</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="" class="pc-link ">
							<span class="pc-micon">
								<i class="fa-solid fa-screwdriver-wrench"></i>
							</span>
							<span class="pc-mtext">Herramientas TIC Corp.</span>
							<span class="pc-arrow"><i class="fa-solid fa-circle-chevron-right"></i></span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="" class="pc-link ">
							<span class="pc-micon">
								<i class="fa-solid fa-screwdriver-wrench"></i>
							</span>
							<span class="pc-mtext">Herramientas TIC publicas</span>
							<span class="pc-arrow"><i class="fa-solid fa-circle-chevron-right"></i></span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu">				
						<a href="" class="pc-link ">
							<span class="pc-micon">
								<i class="fa-brands fa-galactic-republic"></i>
							</span>
							<span class="pc-mtext">TIPS TIC</span>
							<span class="pc-arrow"><i class="fa-solid fa-circle-chevron-right"></i></span>
						</a>
                    </li>
					<!-- <li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Basic</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="bc_alert.html">Plataformas institucionales</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_button.html">Herramientas TIC institucionales</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_badges.html">Herramientas TIC publicas</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_breadcrumb-pagination.html">TIPS TIC</a></li>
						</ul>
					</li> -->
					<!-- <li class="pc-item pc-caption">
						<label>Other</label>
						<span>Extra more things</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link"><span class="pc-micon"><i class="material-icons-two-tone">list_alt</i></span><span class="pc-mtext">Menu levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="#!">Menu Level 2.1</a></li>
							<li class="pc-item pc-hasmenu">
								<a href="#!" class="pc-link">Menu level 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="#!">Menu level 3.1</a></li>
									<li class="pc-item"><a class="pc-link" href="#!">Menu level 3.2</a></li>
									<li class="pc-item pc-hasmenu">
										<a href="#!" class="pc-link">Menu level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
										<ul class="pc-submenu">
											<li class="pc-item"><a class="pc-link" href="#!">Menu level 4.1</a></li>
											<li class="pc-item"><a class="pc-link" href="#!">Menu level 4.2</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="pc-item pc-hasmenu">
								<a href="#!" class="pc-link">Menu level 2.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="#!">Menu level 3.1</a></li>
									<li class="pc-item"><a class="pc-link" href="#!">Menu level 3.2</a></li>
									<li class="pc-item pc-hasmenu">
										<a href="#!" class="pc-link">Menu level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
										<ul class="pc-submenu">
											<li class="pc-item"><a class="pc-link" href="#!">Menu level 4.1</a></li>
											<li class="pc-item"><a class="pc-link" href="#!">Menu level 4.2</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ Header ] start -->
	<header class="pc-header ">
		<div class="header-wrapper">
			<!-- MENU AJUSTES -->
			<div class="mr-auto pc-mob-drp">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link active dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							Ajustes
						</a>
						<div class="dropdown-menu pc-h-dropdown">
							<a href="<?= url('users'); ?>" class="dropdown-item">
								<i class="material-icons-two-tone">account_circle</i>
								<span>Mi cuenta</span>
							</a>
							<a href="<?= ''//url('users'); ?>" class="dropdown-item">
								<i class="material-icons-two-tone">account_circle</i>
								<span>Crear usuario</span>
							</a>
							<a href="<?= ''//url('users'); ?>" class="dropdown-item">
								<i class="material-icons-two-tone">account_circle</i>
								<span>Permisos de usuario</span>
							</a>
							
							<!-- <div class="pc-level-menu">
								<a href="" class="dropdown-item">
									<i class="material-icons-two-tone">list_alt</i>
									<span class="float-right"><i data-feather="chevron-right" class="mr-0"></i></span>
									<span>Level2.1</span>
								</a>
								<div class="dropdown-menu pc-h-dropdown">
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>My Account</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Settings</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Support</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Lock Screen</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Logout</span>
									</a>
								</div>
							</div> -->
						</div>
					</li>
				</ul>
			</div>
			<!-- MENU SUPERIOR DERECHO -->
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i class="material-icons-two-tone">search</i>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-search">
							<form class="px-3">
								<div class="form-group mb-0 d-flex align-items-center">
									<i data-feather="search"></i>
									<input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
								</div>
							</form>
						</div>
					</li>
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<!-- <img src="assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar"> -->
							<span>
								<span class="user-name">{{ $firstName.' '.$lastName }}</span>
								<span class="user-desc">{{ $nameRole }}</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							<div class=" dropdown-header">
								<!-- <h5 class="text-overflow m-0"><span class="badge bg-light-primary"><a href="https://gumroad.com/dashboardkit" target="_blank">Upgrade to Pro</a></span></h5> -->
							</div>
				
							<a href="<?= url('logout'); ?>" class="dropdown-item">
								<i class="material-icons-two-tone">chrome_reader_mode</i>
								<span>Logout</span>
							</a>
						</div>
					</li>
				</ul>
			</div>

		</div>
	</header>
	<!-- BARRA DONDE MUESTRA LA BIENVENIDA AL USUARIO -->
    <div class="pc-container">
        <div class="pcoded-content">
		    @role('admin')
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Bienvenida/o</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">{{ $firstName.' '.$lastName }}</a></li>
                                    <!-- <li class="breadcrumb-item">Dashboard sale</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
            @endrole
    		@yield('content')
    	</div>
    </div>
	<!-- DIRECTIVAS IMPORTANTES NO BORRAR -->
	<!-- usuarios invitados -->
	@guest
	<!-- no autenticados -->
	@else
	<!-- autenticados o caso contrario -->
	@endguest

	<!-- usuarios autenticados -->
	@auth
	<!-- autenticados -->
	@else
	<!-- no autenticados -->
	@endauth
	<!-- FIN DIRECTIVAS IMPORTANTES NO BORRAR -->

	
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Js -->
    <script src="{{  asset('assets/js/vendor-all.min.js')  }}"></script>
    <script src="{{  asset('assets/js/plugins/bootstrap.min.js')  }}"></script>
    <script src="{{  asset('assets/js/plugins/feather.min.js')  }}"></script>
    <script src="{{  asset('assets/js/pcoded.min.js')  }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> -->
    <!-- <script src="{{  asset('assets/js/plugins/clipboard.min.js')  }}"></script> -->
    <!-- <script src="{{  asset('assets/js/uikit.min.js')  }}"></script> -->

    <!-- Apex Chart -->
    <!-- <script src="{{  asset('assets/js/plugins/apexcharts.min.js')  }}"></script> -->
    <script>
        // $("body").append('<div class="fixed-button active"><a href="https://gumroad.com/dashboardkit" target="_blank" class="btn btn-md btn-success"><i class="material-icons-two-tone text-white">shopping_cart</i> Upgrade To Pro</a> </div>');
    </script>

    <!-- custom-chart js -->
    <!-- <script src="{{  asset('assets/js/pages/dashboard-sale.js')  }}"></script> -->




	<!-- dataTable-->
    <!-- datatables es una extensión de jQuery que nos permite pintar tablas con paginado, búsqueda, ordenar por columnas, etc. -->
    <!-- css-->
    <link rel="stylesheet" type="text/css" href="{{  asset('vendorSystemFile/datatable/css/jquery.dataTables.min.css') }}">
    	<link rel="stylesheet" type="text/css" href="{{  asset('vendorSystemFile/datatable/css/buttons.dataTables.min.css') }}">
    	<link rel="stylesheet" type="text/css" href="{{  asset('vendorSystemFile/datatable/css/fixedHeader.dataTables.min.css') }}">
    	<!-- UTIL PARA DAR FORMA A LA DATATABLES-->
    	<link rel="stylesheet" type="text/css" href="{{  asset('vendorSystemFile/datatable/css/dataTables.bootstrap.min.css') }}">
    	<link rel="stylesheet" type="text/css" href="{{  asset('vendorSystemFile/datatable/css/responsive.bootstrap.min.css') }}">
    	<!-- bootstrap.min.css SIRVE PARA EL DISEÑO DE LA TABLA, AL DEJAR SOLO LA QUE VIENE EN BOOTSTRAP NO PINTA LAS FLECHAS DE LAS COLUMNAS -->
    	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- js-->
    	<!-- <script type="text/javascript" charset="utf8" src="../../framework/datatable/js/jquery-3.3.1.js"></script> -->
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/jquery.dataTables.min.js') }}"></script>
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/dataTables.buttons.min.js') }}"></script>
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/buttons.flash.min.js') }}"></script>
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/jszip.min.js') }}"></script>
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/pdfmake.min.js') }}"></script>
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/vfs_fonts.js') }}"></script>
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/buttons.html5.min.js') }}"></script>
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/buttons.print.min.js') }}"></script>
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/dataTables.rowReorder.min.js') }}"></script>
    	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/datatable/js/dataTables.responsive.min.js') }}"></script>

	<!-- JQUERY -->
	<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/jquery/jquery-3.6.1.min.js') }}"></script>
	<!-- <script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/jquery/jquery-3.5.1.min.js') }}"></script> -->
	<!-- <script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/jquery/jquery-3.4.1.min.js') }}"></script> -->
	
	<!-- SELECT CON BUSCAR INTEGRADO -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<!-- PROCESOS ESTANDAR -->
    <script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/js/jsProcesosEstandar.js') }}"></script>

	<!-- SWEETALERY2 -->
	<script src="{{  asset('vendorSystemFile/sweetalert2/sweetalert2v11.6.9.js')  }}"></script>


	<script>
		setUrlBase('<?=$urlJs?>')
	</script>
	    
</body>

</html>

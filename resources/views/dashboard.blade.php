<!DOCTYPE html>
<html lang="es">
<head>
    @include('includes.head')
</head>
<body>
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
	<!--Sidebar-->
    @include('includes.sidebar')
	<!--Header dashboard -->
    @include('includes.header_dashboard')
	<!-- BARRA DONDE MUESTRA LA BIENVENIDA AL USUARIO -->
    <div class="pc-container">
        <div class="pcoded-content">
    		@yield('content')
    	</div>
    </div>
</body>
@include('includes.footer')
</html>

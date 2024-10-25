
@extends('formLandingPage')
@section('title', 'Inicio de sesión')

@section('linkForm')
  <!-- ESTE ES UN LINK -->
  <script src="{{  asset('vendorSystemFile/js/login/jsLoginUsuario.js')  }}"></script>
@endsection


@section('content')

<!-- [ auth-signin ] start -->
<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<br>
</div>

<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
</div>

<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
    
    <div class="card contenedor">
    	<div class="row">
    		<!-- <div class="col-md-12"> -->
    			<div class="card-body">

    				<!-- <img src="assets/images/logo-dark.svg" alt="" class="img-fluid mb-4"> -->
    				<h4 class="mb-3 align-items-center text-center">Signin</h4>
    				<div class="input-group mb-3">
    					<span class="input-group-text"><i class="fa-solid fa-envelope-circle-check"></i></span>
    					<input type="email" id="email" class="form-control" placeholder="Email address">
    				</div>
    				<div class="input-group mb-4">
    					<span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
    					<input type="password" id="password" class="form-control" placeholder="Password">
    				</div>
    
    				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    				
    				<div class="form-group text-left mt-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Save credentials</label>
                            </div>
    				</div>

					<div class="form-group text-center">
    				    <button class="btn btn-block btn-primary mb-4" id="btnIniciarSesion" onclick="formLuApp.btnIniciarSesion();"><i class="fa-solid fa-power-off"></i> Inicial sesion</button>
    				    <p class="mb-0 text-muted">Don’t have an account? <a href="{{route('registro.index')}}" class="f-w-400">Signup</a></p>
					</div>
				</div>
    		<!-- </div> -->
    	</div>
    </div>
    	
</div>

<!-- [ auth-signin ] end -->
@endsection
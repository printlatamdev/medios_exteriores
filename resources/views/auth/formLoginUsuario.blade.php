@extends('formLandingPage')
@section('title', 'Inicio de sesión')

@section('linkForm')
    <!-- ESTE ES UN LINK -->
    <script src="{{ asset('vendorSystemFile/js/login/jsLoginUsuario.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid px-5 mt-4">
        <div class="row d-flex justify-content-end">
            <div class="col-3 border rounded">
                <!-- <div class="col-md-12"> -->
                <div class="card-body">
                    <!-- <img src="assets/images/logo-dark.svg" alt="" class="img-fluid mb-4"> -->
                    <h4 class="mb-3 align-items-center text-center">Iniciar sesión</h4>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope-circle-check"></i></span>
                        <input type="email" id="email" class="form-control" placeholder="Correo electrónico">
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" id="password" class="form-control" placeholder="Contraseña">
                    </div>

                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                    <div class="form-group text-left mt-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Guardar credenciales</label>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-block btn-primary mb-4" id="btnIniciarSesion"
                            onclick="formLuApp.btnIniciarSesion();"><i class="fa-solid fa-power-off"></i> Iniciar
                            sesion</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

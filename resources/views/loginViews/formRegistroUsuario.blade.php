
@extends('formLandingPage')
@section('title', 'Registro de usuario')

@section('linkForm')
  <!-- ESTE ES UN LINK -->
  <script src="{{  asset('vendorSystemFile/js/login/jsRegistroUsuario.js')      }}"></script>
@endsection


@section('content')

<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<br>
</div>

<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
</div>

<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="card contenedor">
        <div class="card-body">
            <h5>Registro de usuario perfil de ususario</h5>
            <hr>
            <div class="row">

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInput1">Nombres</label>
                        <input type="text" class="form-control " id="nombresUser" aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInput1">Apellidos</label>
                        <input type="text" class="form-control " id="apellidosUser" aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInput1">Sexo</label>
                        <?=$sexo?>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInput1">Pais</label>
                        <?=$idPais?>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInput1">Cargo institucion</label>
                        <input type="text" class="form-control " id="cargoUser" aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInput1">Email</label>
                        <input type="text" class="form-control " id="emailUser" aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInput1">Confirmar Email</label>
                        <input type="text" class="form-control " id="confirmarEmailUser" aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control " id="password" placeholder="Password">
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-2">                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInputPassword1">Confirmar Password</label>
                        <input type="password" class="form-control " id="confirmarPassword" placeholder="Password">
                    </div>
                </div>

				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">                   
                    <button type="button" class="btn btn-success" onclick="formRegistroUsuario.btnGuardar();"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
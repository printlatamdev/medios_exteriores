@extends('dashboard')
@section('title', 'Prueba de fracciones de vistas')

@section('linkForm')
    <!-- ESTE ES UN LINK -->
    <script src="{{ asset('vendorSystemFile/js/dashboard/jsHome.js') }}"></script>
@endsection


@section('content')








    @role('admin')
        Soy un administrador
    @else
        No soy un administrador
    @endrole

    @can('users.index')
        Tengo el permiso universal
    @else
        No tengo permisos
    @endcan


    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- support-section start -->

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 mt-3 mb3">
            <div class="card-group">
                <div class="card">
                    <!-- <div class="card-header">
                                    <h5>Plataformas institucionales</h5>
                                </div> -->
                    <img src="https://img.freepik.com/foto-gratis/ciudad-inteligente-futurista-tecnologia-red-global-5g_53876-98438.jpg?size=626&ext=jpg&ga=GA1.2.1703535758.1669070976"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Plataformas de Cenpromype</h5>
                    </div>
                    <div class="card-footer bg-primary">
                        <p class="card-text text-white"><small>Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 mt-3 mb3">
            <div class="card-group">
                <div class="card">
                    <!-- <div class="card-header">
                                    <h5>Plataformas institucionales</h5>
                                </div> -->
                    <img src="https://img.freepik.com/foto-gratis/ciudad-inteligente-futurista-tecnologia-red-global-5g_53876-98438.jpg?size=626&ext=jpg&ga=GA1.2.1703535758.1669070976"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Plataformas institucionales</h5>
                    </div>
                    <div class="card-footer bg-primary">
                        <p class="card-text text-white"><small>Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 mt-3 mb3">
            <div class="card-group">
                <div class="card">
                    <!-- <div class="card-header">
                                    <h5>Plataformas institucionales</h5>
                                </div> -->
                    <img src="https://img.freepik.com/foto-gratis/ciudad-inteligente-futurista-tecnologia-red-global-5g_53876-98438.jpg?size=626&ext=jpg&ga=GA1.2.1703535758.1669070976"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Plataformas publicas</h5>
                    </div>
                    <div class="card-footer bg-primary">
                        <p class="card-text text-white"><small>Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 mt-3 mb3">
            <div class="card-group">
                <div class="card">
                    <!-- <div class="card-header">
                                    <h5>Plataformas institucionales</h5>
                                </div> -->
                    <img src="https://img.freepik.com/foto-gratis/ciudad-inteligente-futurista-tecnologia-red-global-5g_53876-98438.jpg?size=626&ext=jpg&ga=GA1.2.1703535758.1669070976"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>TIPS TIC</h5>
                    </div>
                    <div class="card-footer bg-primary">
                        <p class="card-text text-white"><small>Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endsection

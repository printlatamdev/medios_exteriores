<header class="pc-header sticky-top bg-white">
    <!-- MENU AJUSTES -->
    <div class="mr-auto">
        <ul class="list-unstyled">
            <li class="dropdown">
                <a class="pc-head-link active dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    Ajustes
                </a>
                <div class="dropdown-menu pc-h-dropdown p-2">
                    <a href="#" class="dropdown-item">
                        <i class="material-icons-two-tone">account_circle</i>
                        <span>Mi cuenta</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="material-icons-two-tone">account_circle</i>
                        <span>Crear usuario</span>
                    </a>
                    <a href="">
                        <i class="material-icons-two-tone">account_circle</i>
                        <span>Permisos de usuario</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <!-- MENU SUPERIOR DERECHO -->
    <div class="ml-auto">
        <ul class="list-unstyled">
            <li class="dropdown pc-h-item">
                <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="material-icons-two-tone">search</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-search">
                    <form class="px-3">
                        <div class="form-group mb-0 d-flex align-items-center">
                            <i data-feather="search"></i>
                            <input type="search" class="form-control border-0 shadow-none"
                                placeholder="Buscar aquí...">
                        </div>
                    </form>
                </div>
            </li>
            <li class="dropdown pc-h-item">
                <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <!-- <img src="assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar"> -->
                    <span>
                        <span class="user-name">{{ $firstName . ' ' . $lastName }}</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
                    <div class=" dropdown-header">
                        <!-- <h5 class="text-overflow m-0"><span class="badge bg-light-primary"><a href="https://gumroad.com/dashboardkit" target="_blank">Upgrade to Pro</a></span></h5> -->
                    </div>

                    <a href="<?= url('logout') ?>" class="dropdown-item">
                        <i class="material-icons-two-tone">chrome_reader_mode</i>
                        <span>Cerrar sesión</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>

</header>
<div class="page-header container-fluid border-top bg-white">
    <div class="row">
        <div class="col-12 d-flex">
            <div class="page-header-title">
                <h5 class="m-b-10">Bienvenida/o</h5>
            </div>
            <span>{{ $firstName . ' ' . $lastName }}</span>
        </div>
    </div>
</div>

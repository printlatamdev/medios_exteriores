
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
                                <input type="search" class="form-control border-0 shadow-none" placeholder="Buscar aquí...">
                            </div>
                        </form>
                    </div>
                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <!-- <img src="assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar"> -->
                        <span>
                            <span class="user-name">{{ $firstName.' '.$lastName }}</span>
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
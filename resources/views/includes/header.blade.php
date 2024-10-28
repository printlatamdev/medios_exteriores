<nav class="logo-imagen navbar sticky-top navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo.jpg" alt="" class="" style="width: 120px; display:block; margin:0 auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}"><i
                                class="fa-solid fa-house-circle-check"></i>&nbsp;Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registro.index') }}" class="btn btn-info my-2 my-sm-0"><i
                                class="fa-solid fa-restroom"></i>&nbsp;Registro&nbsp;&nbsp;</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>

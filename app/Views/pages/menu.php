<header id="header" class="fixed-top menu-app">
    <div class="container d-flex align-items-center justify-content-lg-between">

    <a href="<?php echo base_url(); ?>" class="logo align-items-center me-auto me-lg-0"><img src="<?php echo base_url();?>/img/Logo.png" alt="" class="img-fluid"><span>Apparta</span></a>

    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li><a class="nav-link scrollto" href="<?php echo base_url().route_to('mesas_reservas') ?>">Mesas y reservas</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url().route_to('reservar') ?>">Reservar</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url().route_to('gesusuarios') ?>">Gestionar usuarios</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url().route_to('gesmesas') ?>">Gestionar mesas</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url().route_to('gesreservas') ?>">Gestionar reservas</a></li>
            <li class="dropdown"><a href="#"><span><?php echo session('nombre_usuario'); ?></span> <i class="bi bi-person-circle"></i></a>
                <ul>
                    <li><a href="<?php echo base_url().route_to('perfil') ?>">Mi perfil</a></li>
                    <li><a href="<?php echo base_url().route_to('salir') ?>">Cerrar sesión<i class="bi-box-arrow-left"></i></a></li>
                </ul>
            </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    </div>
</header>
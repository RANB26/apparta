<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <a href="<?php echo base_url(); ?>" class="logo align-items-center me-auto me-lg-0"><img src="<?php echo base_url();?>/img/Logo.png" alt="" class="img-fluid"><span>Apparta</span></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre la aplicación</a></li>
          <li><a class="nav-link scrollto" href="#services">Beneficios</a></li>
          <li><a class="nav-link scrollto" href="#team">Desarrolladores</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?php echo base_url().route_to('login') ?>" class="get-started-btn scrollto">Ingresar</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Apparta<span>.</span></h1>
          <h2>Sistema de reserva de mesas</h2>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Sobre la aplicación ======= -->
    <section id="about" class="about px-3">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="<?php echo base_url();?>/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Sobre la aplicación</h3>
            <p>
              <br>
                Optimiza la gestión de reservas de tu restaurante con nuestra aplicación intuitiva y eficiente.
              <br><br>
                Nuestra aplicación está diseñada especialmente para que los administradores de restaurantes gestionen todas las reservas de manera fácil y rápida. 
                Con ella, puedes organizar la disponibilidad de las mesas, recibir y confirmar reservas al instante, y asegurarte de que cada cliente tenga la mejor 
                experiencia posible desde el momento en que hace su reserva hasta su llegada.
              <br><br>
                La gestión de reservas nunca fue tan sencilla. No importa cuántas mesas tengas o cuántos clientes debas atender, tendrás todo bajo 
                control para ofrecer un servicio ágil y de calidad.
            </p>
          </div>
        </div>

      </div>
    </section><!-- Fin Sobre la aplicación -->

    <!-- ======= Beneficios ======= -->
    <section id="services" class="services px-3">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Beneficios</h2>
          <p>Nuestros beneficios</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-cog'></i></div>
              <h4>Gestión centralizada de reservas</h4>
              <p>Administra todas las reservas desde un único panel, viendo las solicitudes en tiempo real</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-download'></i></div>
              <h4>Disponibilidad de mesas</h4>
              <p>Establece y ajusta la disponibilidad de las mesas de tu restaurante según el horario, el tipo de mesa y la capacidad de cada una.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-history' ></i></div>
              <h4>Historial de reservas</h4>
              <p>Accede al historial completo de reservas pasadas de usuarios</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- Fin Beneficios -->

    <!-- ======= Equipo ======= -->
    <section id="team" class="team px-3">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Desarrolladores</h2>
          <p>Nuestro equipo de desarrollo</p>
        </div>

        <div class="row justify-content-center px-3">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="<?php echo base_url();?>/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://x.com/?lang=es"><i class="bi bi-twitter"></i></a>
                  <a href="https://es-la.facebook.com/"><i class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                  <a href="https://co.linkedin.com/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Rayver Nuñez</h4>
                <span>Rayver Nuñez</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="<?php echo base_url();?>/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://x.com/?lang=es"><i class="bi bi-twitter"></i></a>
                  <a href="https://es-la.facebook.com/"><i class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                  <a href="https://co.linkedin.com/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Juan Padilla</h4>
                <span>Juan Padilla</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- Fin Equipo -->

  </main><!-- End #main -->
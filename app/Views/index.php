<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <a href="<?php echo base_url(); ?>" class="logo align-items-center me-auto me-lg-0"><img src="<?php echo base_url();?>/img/Logo.png" alt="" class="img-fluid"><span>Houslys</span></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre nosotros</a></li>
          <li><a class="nav-link scrollto" href="#services">Servicios</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Recomendados</a></li>
          <li><a class="nav-link scrollto" href="#team">Equipo</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?php echo base_url().route_to('login') ?>" class="get-started-btn scrollto">Publicar ahora</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Houslys<span>.</span></h1>
          <h2>Encuentra la vivienda que buscabas</h2>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Sobre Nosotros ======= -->
    <section id="about" class="about px-3">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="<?php echo base_url();?>/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Un poco sobre nosotros</h3>
            <p>
              <br>
              En Houslys, nos apasiona ayudarte a encontrar el hogar ideal. 
              <br><br>
              Nos especializamos en conectar a nuestros clientes con propiedades que se ajustan a sus necesidades y estilo de vida.
              Ofrecemos un servicio personalizado, confiable y transparente, trabajando de la mano tanto con propietarios como con inquilinos para garantizar la mejor experiencia posible. 
              Nuestro compromiso es hacer que el proceso de arrendar sea sencillo y satisfactorio, asegurándonos de que encuentres el espacio perfecto para crear nuevos recuerdos.
              <br><br>
              ¡Estamos aquí para ayudarte a hacer de tu próxima casa, tu hogar!
            </p>
          </div>
        </div>

      </div>
    </section><!-- Fin Sobre Nosotros -->

    <!-- ======= Servicios ======= -->
    <section id="services" class="services px-3">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Servicios</h2>
          <p>Nuestros servicios disponibles</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-upload'></i></div>
              <h4>Publica tu vivienda</h4>
              <p>Dentro de nuestra plataforma podrás publicar cualquier vivienda que tengas disponible para vender o arrendar</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-building-house'></i></div>
              <h4>Casas en arriendo</h4>
              <p>Aquí podrás encontrar la casa y/o apartamento con las caracteriticas que desees</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class='bx bx-money-withdraw'></i></div>
              <h4>Casas en venta</h4>
              <p>Tambien podrás buscar casas que se encuentren en venta de una manera mucho más facil</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- Fin Servicios -->

    <!-- ======= Recomendados ======= -->
    <section id="portfolio" class="portfolio px-3">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Recomendados</h2>
          <p>Viviendas más recomendadas</p>
        </div>

        <div class="row justify-content-center  px-4">
          <a href="<?php echo base_url().route_to('login') ?>" class="col-lg-3 mx-4 my-2 p-0">
            <div class="card">
              <img src="<?php echo base_url();?>/img/vivienda.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>$150.000.000</b> COP</h5>
                <h6 class="card-text mt-3">1 hab - 1 baño - 1pa</h6>
                <h6 class="card-text mt-2">Cra 14 #69-68</h6>
              </div>
              <div class="card-footer">
                <small class="text-muted">Publicada hace 2 semanas</small>
              </div>
            </div>
          </a>
          <a href="<?php echo base_url().route_to('login') ?>" class="col-lg-3 mx-4 my-2 p-0">
            <div class="card">
              <img src="<?php echo base_url();?>/img/vivienda.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>$150.000.000</b> COP</h5>
                <h6 class="card-text mt-3">1 hab - 1 baño - 1pa</h6>
                <h6 class="card-text mt-2">Cra 14 #69-68</h6>
              </div>
              <div class="card-footer">
                <small class="text-muted">Publicada hace 2 semanas</small>
              </div>
            </div>
          </a>
          <a href="<?php echo base_url().route_to('login') ?>" class="col-lg-3 mx-4 my-2 p-0">
            <div class="card">
              <img src="<?php echo base_url();?>/img/vivienda.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><b>$150.000.000</b> COP</h5>
                <h6 class="card-text mt-3">1 hab - 1 baño - 1pa</h6>
                <h6 class="card-text mt-2">Cra 14 #69-68</h6>
              </div>
              <div class="card-footer">
                <small class="text-muted">Publicada hace 2 semanas</small>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section><!-- Fin Recomendados -->

    <!-- ======= Equipo ======= -->
    <section id="team" class="team px-3">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Equipo</h2>
          <p>Nuestro equipo de trabajo</p>
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
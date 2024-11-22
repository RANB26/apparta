<!-- Vivienda Detalles -->
<div id='info-vivienda'>
    <section id="details">
        <div class="container">
            <div class="row">
                <!-- Slider de imágenes -->
                <div class="col-lg-6">
                    <div id="viviendaCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url();?>/img/vivienda.jpg" class="d-block w-100" alt="Vivienda Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url();?>/img/vivienda.jpg" class="d-block w-100" alt="Vivienda Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url();?>/img/vivienda.jpg" class="d-block w-100" alt="Vivienda Imagen 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#viviendaCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#viviendaCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
                <!-- Detalles de la vivienda -->
                <div class="col-lg-6">
                    <h2 class="">Detalles de la Vivienda</h2>
                    <p><strong>Tipo:</strong> <?php echo $info_vivienda[0]['tipo_vivienda']?></p>
                    <p><strong>Precio:</strong> $<?php echo $info_vivienda[0]['precio_vivienda']?> COP</p>
                    <p><strong>Estado:</strong> <?php echo $info_vivienda[0]['estado_vivienda']?></p>
                    <p><strong>Dirección:</strong> <?php echo $info_vivienda[0]['direccion_vivienda']?></p>
                    <p><strong>Área:</strong> <?php echo $info_vivienda[0]['area_vivienda']?> m²</p>
                    <p><strong>Estrato:</strong> <?php echo $info_vivienda[0]['estrato_vivienda']?></p>
                    <p><strong>Habitaciones:</strong> <?php echo $info_vivienda[0]['numhabitaciones_vivienda']?></p>
                    <p><strong>Baños:</strong> <?php echo $info_vivienda[0]['numbaño_vivienda']?></p>
                    <p><strong>Descripción:</strong> <?php echo $info_vivienda[0]['descripcion_vivienda']?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Información del Usuario -->
    <section id="user" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Información del Propietario</h2>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $propietario[0]['nombre_usuario']." ".$propietario[0]['apellido_usuario'] ?></h5>
                            <p class="card-text"><i class="bi bi-envelope-open-fill"></i> <?php echo $propietario[0]['correo_usuario'] ?></p>
                            <p class="card-text"><i class="bi bi-telephone-fill"></i> <?php echo $propietario[0]['celular_usuario'] ?></p>
                            <p class="card-text">Contacta al propietario con estos datos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
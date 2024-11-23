<section class="fondo-perfil" style="background-color: #eee;">
    <div class="container py-5">
    
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4 cuadros">
                    <div class="card-body text-center">
                        <img src="<?php echo base_url(); ?>/img/perfil.jpg" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">
                            <?php echo $cliente['nombre_usuario']; ?>
                            <?php echo $cliente['apellido_usuario']; ?>
                        </h5>
                        <h6 class="text-muted mb-1"><?php echo $cliente['tipo_usuario']; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-5 cuadros info">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nombres</h6>
                        </div>
                        <div class="col-sm-9">
                            <h6 class="text-muted mb-0"><?php echo $cliente['nombre_usuario']; ?></h6>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Apellidos</h6>
                        </div>
                        <div class="col-sm-9">
                            <h6 class="text-muted mb-0"><?php echo $cliente['apellido_usuario']; ?></h6>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Correo Electronico</h6>
                        </div>
                        <div class="col-sm-9">
                            <h6 class="text-muted mb-0"><?php echo $cliente['correo_usuario']; ?></h6>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Teléfono</h6>
                        </div>
                        <div class="col-sm-9">
                            <h6 class="text-muted mb-0"><?php echo $cliente['celular_usuario']; ?></h6>
                        </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-md-12  mb-3">
                <div class="card mb-4 mb-md-0 cuadros">
                    <div class="card-body">
                        <div class="section-title" style="padding:5px;">
                            <h2>Reservas activas y próximas</h2>
                        </div>
                        <div class="row portfolio justify-content-center py-2 px-4">
                            <?php foreach($reservas_cliente as $reserva){ 
                                if($reserva->estado_reserva=='Activa' or $reserva->estado_reserva=='Confirmada'){ ?> 
                                    <div class="col-lg-3 col-md-5 mx-3 my-3">
                                        <div class="opciones">
                                            <div class="estado">
                                                <button>
                                                    <i id="" class="fas <?php if($reserva->estado_reserva=='Activa'){echo 'fa-circle activa';}else{echo 'fa-calendar-check confirmada';}?>"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <a>
                                            <div class="card">
                                                <img src="<?php echo base_url();?>/img/reserva.jpg" class="card-img-top" alt="...">
                                                <div class="card-body" style="padding:0px; padding-bottom:20px;">
                                                    <h6 class="card-text">Mesa <?php echo $reserva->id_mesa ?> - <?php echo $reserva->tipo_mesa ?></h6>
                                                    <h6 class="card-text"><?php echo $reserva->num_personas ?> personas</h6>
                                                </div>
                                                <div class="card-footer">
                                                    <small class="text-muted">
                                                        <?php 
                                                            if($reserva->estado_reserva=='Activa'){
                                                                echo date("H:i", strtotime($reserva->fecha_inicio)) ?> - <?php echo date("H:i", strtotime($reserva->fecha_fin)); 
                                                            }else{
                                                                echo $reserva->fecha_inicio;
                                                            }
                                                        ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-4 mb-md-0 cuadros">
                    <div class="card-body">
                        <div class="section-title" style="padding:0px;">
                            <h2>Historial de reservas</h2>
                        </div>
                        <div class="row portfolio justify-content-center py-2 px-4">
                            <?php foreach($reservas_cliente as $reserva){
                                if($reserva->estado_reserva=='Finalizada' or $reserva->estado_reserva=='Cancelada'){ ?> 
                                <div class="col-lg-3 col-md-5 mx-3 my-3">
                                    <div class="opciones">
                                        <div class="estado">
                                            <button>
                                                <i id="" class="fas <?php if($reserva->estado_reserva=='Finalizada'){echo 'fa-check-circle finalizada';}else{echo 'fa-times-circle cancelada';}?>"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <a>
                                        <div class="card">
                                            <img src="<?php echo base_url();?>/img/reserva.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" style="padding:0px; padding-bottom:20px;">
                                                <h6 class="card-text">Mesa <?php echo $reserva->id_mesa ?> - <?php echo $reserva->tipo_mesa ?></h6>
                                                <h6 class="card-text"><?php echo $reserva->num_personas ?> personas</h6>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted"><?php echo $reserva->fecha_inicio ?></small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

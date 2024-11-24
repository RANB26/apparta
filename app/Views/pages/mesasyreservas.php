<div class="row mesas">
    <div class="col-6 mesas-scroll">
        <div class="section-title" style="padding:0px;">
            <h2>Mesas</h2>
            <p>Mesas disponibles</p>
        </div>
        <div class="row portfolio listamesas-scroll">
            <?php foreach($mesas as $mesa){
                if($mesa->estado_mesa=='Disponible'){ ?> 
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-6 py-3">
                    <div class="opciones">
                        <div class="estado">
                            <button>
                                <i id="" class="fas fa-circle disponible"></i>
                            </button>
                        </div>
                    </div>
                    <a>
                        <div class="card">
                            <div class="num-mesa"><?php echo $mesa->id_mesa ?></div>
                            <div class="card-body">
                                <h6 class="card-text"><?php echo $mesa->tipo_mesa ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
            <?php }} ?>
        </div>
        <br>
        <div class="section-title" style="padding:0px;">
            <h2>Mesas</h2>
            <p>Mesas ocupadas</p>
        </div>
        <div class="row portfolio mesas-scroll">
            <?php foreach($mesas as $mesa){
                if($mesa->estado_mesa=='Ocupada'){ ?> 
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-6 py-3">
                        <div class="opciones">
                            <div class="estado">
                                <button>
                                    <i id="" class="fas fa-circle ocupado"></i>
                                </button>
                            </div>
                        </div>
                        <a>
                            <div class="card">
                                <div class="num-mesa"><?php echo $mesa->id_mesa ?></div>
                                <div class="card-body">
                                    <h6 class="card-text mt-3"><?php echo $mesa->tipo_mesa ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php }} ?>
        </div>
    </div>
    <div class="col-6">
        <div class="section-title" style="padding:0px;">
            <h2>Reservas</h2>
            <p>Reservas para hoy</p>
        </div>
        <div class="row portfolio">
            <?php foreach($reservas_hoy as $reserva){ ?>
                <div class="col-lg-4 col-md-5 mx-3 my-3">
                    <a>
                        <div class="opciones">
                            <div class="estado">
                                <?php if($reserva->estado_reserva == 'Activa'){ ?>
                                    <a href="<?php echo base_url().route_to('finalizar_reserva', $reserva->id_reserva) ?>" style='margin: -10px 10px 0 0'>
                                        <i class="fas fa-hourglass-end" style='color: #CECECE'></i>
                                    </a>
                                <?php } else if($reserva->estado_reserva == 'Confirmada'){ ?>
                                    <a href="<?php echo base_url().route_to('iniciar_reserva', $reserva->id_reserva) ?>" style='margin: -10px 8px 0 0'>
                                        <i class="fas fa-calendar-check" style='color: #7DDA58'></i>
                                    </a>
                                    <a href="<?php echo base_url().route_to('cancelar_reserva_pages', $reserva->id_reserva) ?>" style='margin: -10px 10px 0 0'>
                                        <i class="fas fa-times" style='color: #D20103'></i>
                                    </a>
                                <?php } else if($reserva->estado_reserva == 'Finalizada'){ ?>
                                    <a style='margin: -10px 8px 0 0'>
                                        <i class="fas fa-check-circle" style='color: #0086E0'></i>
                                    </a>
                                <?php }?>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?php echo base_url();?>/img/reserva.jpg" class="card-img-top" alt="...">
                            <div class="card-body" style="padding:0px; padding-bottom:20px; text-align:center">
                                <h5 class="card-title"><?php echo $reserva->nombre_cliente." ".$reserva->apellido_cliente ?></h5>
                                <h6 class="card-text">Mesa <?php echo $reserva->id_mesa ?> - <?php echo $reserva->tipo_mesa ?></h6>
                                <h6 class="card-text"><?php echo $reserva->num_personas ?> personas</h6>
                            </div>
                            <div class="card-footer" style="text-align:center">
                                <small class="text-muted"><?php echo date("H:i", strtotime($reserva->fecha_inicio)) ?> - <?php echo date("H:i", strtotime($reserva->fecha_fin)) ?></small>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
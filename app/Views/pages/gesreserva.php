<div class="container-fluid py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card my-5">
                <div class="table-title">
                    <div class="titulo mx-auto">
                        <h2><i class="bx bxs-calendar mx-1"></i> Actualizar <b>Reserva</b></h2>
                    </div>
                </div>
                <form class="form-card p-5 formulario" method="POST" action="<?php echo base_url().route_to('actualizar_reserva') ?>">
                    <input class="form-control" type="hidden" name="id_reserva" value="<?php echo $reserva[0]->id_reserva ?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Cliente<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="id_usuario">
                                <?php foreach($clientes as $cliente){
                                    $selected = '';
                                    if($reserva[0]->id_usuario == $cliente->id_usuario) $selected = 'selected';
                                    echo "<option value='".$cliente->id_usuario."' $selected >".$cliente->nombre_usuario." ".$cliente->apellido_usuario."</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Mesa<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="id_mesa"> 
                                <?php foreach($mesas as $mesa){
                                    $selected = '';
                                    if($reserva[0]->id_mesa == $mesa->id_mesa) $selected = 'selected';
                                    echo "<option value='".$mesa->id_mesa."' $selected > Mesa ".$mesa->id_mesa." - ".$mesa->tipo_mesa."</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Número de personas<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="num_personas" min="1" max="99" value="<?php echo $reserva[0]->num_personas ?>" required>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Dia<span class="text-danger"> *</span></label> 
                            <?php $datetime = new DateTime($reserva[0]->fecha_inicio); $fecha = $datetime->format('Y-m-d'); ?>
                            <input class="form-control" type="date" name="dia_reserva" min='<?php echo $fecha_actual ?>' value="<?php echo $fecha ?>" required>
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Hora inicio<span class="text-danger"> *</span></label>
                            <?php $hora_inicio = $datetime->format('H:i:00'); ?>
                            <input class="form-control" type="time" name="hora_inicio" min='<?php echo $hora_actual ?>' step="300" value="<?php echo $hora_inicio ?>" required>
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label px-3">Hora final<span class="text-danger"> *</span></label> 
                            <?php $datetime = new DateTime($reserva[0]->fecha_fin); $hora_fin = $datetime->format('H:i:00'); ?>
                            <input class="form-control" type="time" name="hora_fin" min='<?php echo $hora_actual ?>' step="300" value="<?php echo $hora_fin ?>" required>
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Estado<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="estado_reserva">
                                <option value='Confirmada' <?php if($reserva[0]->estado_reserva=='Disponible'){echo 'selected'; }?>>Confirmada</option>
                                <option value='Activa' <?php if($reserva[0]->estado_reserva=='Activa'){echo 'selected'; }?>>Activa</option>
                                <option value='Finalizada' <?php if($reserva[0]->estado_reserva=='Finalizada'){echo 'selected'; }?>>Finalizada</option>
                                <option value='Cancelada' <?php if($reserva[0]->estado_reserva=='Cancelada'){echo 'selected'; }?>>Cancelada</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="form-group col-sm-6"> 
                            <button type="submit" class="btn btn-primary px-5">Editar</button>
                        </div>
                        <div class="form-group col-sm-6"> 
                            <a href="<?php echo base_url().route_to('gesreservas') ?>" class="btn btn-primary px-5">Volver</a> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

    var mensaje = '<?php echo $mensaje ?>';

    if(mensaje=='hora'){
        Swal.fire('¡Error!','La hora de inicio no puede ser superior a la hora final','error');
    }
    else if(mensaje=='capacidad'){
        Swal.fire('¡Error!','Este tipo de mesa no permite esta capacidad de personas','error');
    }

</script>
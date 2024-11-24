<div class="container-fluid py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card my-5">
                <div class="table-title">
                    <div class="titulo mx-auto">
                        <h2><i class="bx bxs-calendar mx-1"></i> Reservar una <b>Mesa</b></h2>
                    </div>
                </div>
                <form class="form-card p-5 formulario" method="POST" action="<?php echo base_url().route_to('crear_reserva') ?>">
                    <input class="form-control" type="hidden" name="id_usuario_registra" value="<?php echo $id_usuario ?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Cliente<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="id_usuario">
                                <?php foreach($clientes as $cliente){
                                    $selected = '';
                                    if($cliente_reservar != null){
                                        if($cliente_reservar['id_usuario'] == $cliente->id_usuario) $selected = 'selected';
                                    }
                                    echo "<option value='".$cliente->id_usuario."' $selected >".$cliente->nombre_usuario." ".$cliente->apellido_usuario."</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Mesa<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="id_mesa"> 
                                <?php foreach($mesas as $mesa){
                                    echo "<option value='".$mesa->id_mesa."'> Mesa ".$mesa->id_mesa." - ".$mesa->tipo_mesa."</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Número de personas<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="num_personas" min="1" max="99" required>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Dia<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="date" name="dia_reserva" min='<?php echo $fecha_actual ?>' required>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Hora de inicio<span class="text-danger"> *</span></label>
                            <input class="form-control" type="time" name="hora_inicio" min='<?php echo $hora_actual ?>' step="300" required>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex">
                            <label class="form-control-label px-3">Hora final</label> 
                            <input class="form-control" type="time" name="hora_fin" min='<?php echo $hora_actual ?>' step="300" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn btn-primary px-5">Reservar</button></div>
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
    }else if(mensaje=='usuario'){
        Swal.fire('¡Error!','No se encontró a este cliente','error');
    }
    else if(mensaje=='cliente'){
        Swal.fire('¡Error!','Este usuario no es un cliente, por lo tanto no se puede reservar','error');
    }

</script>
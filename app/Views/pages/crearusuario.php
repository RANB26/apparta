<div class="container-fluid py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card my-5">
                <div class="table-title">
                    <div class="titulo mx-auto">
                        <h2><i class='bx bxs-user-detail mx-2'></i>Crear <b>Usuario</b></h2>
                    </div>
                </div>
                <form class="form-card p-5 formulario" method="POST" action="<?php echo base_url().route_to('insertar_usuario');?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Identificación<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="identificacion_usuario" required> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Tipo Usuario<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="id_tipo_usuario">
                                <?php if(session('tipo_usuario') == 'SuperAdmin') echo '<option value="1">SuperAdmin</option>' ?>
                                <option value="2">Admin</option>
                                <option value="3">Cliente</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Nombres<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="text" name="nombre_usuario" required >
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Apellidos<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="text" name="apellido_usuario" required>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Teléfono<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="tel" name="celular_usuario" minlength="10" maxlength="10" required> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Correo<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="email" name="correo_usuario" required> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Contraseña<span class="text-danger"></span></label>
                            <input class="form-control" type="password" name="password_usuario"> 
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="form-group col-sm-6"> 
                            <button type="submit" class="btn btn-primary px-5">Añadir</button>
                        </div>
                        <div class="form-group col-sm-6"> 
                            <a href="<?php echo base_url().route_to('gesusuarios') ?>" class="btn btn-primary px-5">Volver</a> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

    let mensaje = '<?php echo $mensaje ?>';

    if(mensaje=='registrado'){
        Swal.fire('¡Registrado!','Usuario registrado con éxito','success');
    }
</script>
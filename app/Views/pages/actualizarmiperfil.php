<div class="container-fluid py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card my-5">
                <div class="table-title">
                    <div class="titulo mx-auto">
                        <h2><i class='bx bxs-user-detail mx-2'></i>Actualizar <b>mi Perfil</b></h2>
                    </div>
                </div>
                <form class="form-card p-5 formulario" method="POST" action="<?php echo base_url(); ?>/actualizarusuario/1">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">ID Usuario<span class="text-danger"> *</span></label> <input class="form-control" type="number" name="id_usuario" value="<?php echo $info_usuario['id_usuario']?>" readonly> </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Tipo Usuario<span class="text-danger"> *</span></label> <input class="form-control" type="text" name="tipo_usuario" value="<?php echo $info_usuario['tipo_usuario']?>" disabled></div>
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Tipo Usuario<span class="text-danger"> *</span></label> <input class="form-control" type="text" name="identificacion_usuario" value="<?php echo $info_usuario['identificacion_usuario']?>" disabled></div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Nombres<span class="text-danger"> *</span></label> <input class="form-control" type="text" name="nombre_usuario" value="<?php echo $info_usuario['nombre_usuario']?>" required ></div>
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Apellidos<span class="text-danger"> *</span></label> <input class="form-control" type="text" name="apellido_usuario" value="<?php echo $info_usuario['apellido_usuario']?>" required></div>
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Teléfono<span class="text-danger"> *</span></label> <input class="form-control" type="tel" name="celular_usuario" value="<?php echo $info_usuario['celular_usuario']?>" minlength="10" maxlength="10" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Correo<span class="text-danger"> *</span></label> <input class="form-control" type="email" name="correo_usuario" value="<?php echo $info_usuario['correo_usuario']?>" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Contraseña<span class="text-danger"> *</span></label> <input class="form-control" type="password" name="password_usuario" value="<?php echo $info_usuario['password_usuario']?>" required> </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn btn-primary px-5">Editar</button> </div>
                        <div class="form-group col-sm-6"> <a href="<?php echo base_url().route_to('perfil') ?>" class="btn btn-primary px-5">Volver</a> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
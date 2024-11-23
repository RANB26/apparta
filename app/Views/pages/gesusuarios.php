<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="titulo mx-auto">
                    <h2><i class='bx bxs-user-detail mx-2'></i>Gestionar <b>Usuarios</b></h2>
                </div>
            </div>
            <table class="table table-striped table-hover" id="usuarios">
                <thead style="text-align: center;">
                    <tr>
                        <th>#</th>
                        <th>Identificación</th>						
                        <th>Nombres</th>						
                        <th>Apellidos</th>
                        <th>Tipo usuario</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $i){ ?>
                    <tr>
                        <td><?php echo $i->id_usuario ?></td>
                        <td><?php echo $i->identificacion_usuario ?></td>
                        <td><a href="<?php echo base_url().'gesusuarios/usuario/'.$i->id_usuario ?>"><img src="<?php echo base_url(); ?>/img/perfil.jpg" class="avatar" alt="Avatar"><?php echo $i->nombre_usuario?></a></td>
                        <td><?php echo $i->apellido_usuario ?></td>
                        <td><?php echo $i->tipo_usuario ?></td>
                        <td><?php echo $i->celular_usuario ?></td> 
                        <td><?php echo $i->correo_usuario ?></td>                        
                        <td>
                            <?php if($i->tipo_usuario=="Cliente"){ ?>
                                <a href="<?php echo base_url().route_to('perfil_cliente', $i->id_usuario) ?>" class="info" title="Perfil del cliente" data-toggle="tooltip"><i class="material-icons">&#xe88e;</i></a>
                                <a href="<?php echo base_url().route_to('reservar', $i->id_usuario) ?>" class="add" title="Reservar mesa" data-toggle="tooltip"><i class="material-icons">&#xeac6;</i></a>
                            <?php } ?>
                            <a href="<?php echo base_url().route_to('gesusuario', $i->id_usuario) ?>" class="settings" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <?php if((session('tipo_usuario')=='SuperAdmin' and $i->id_usuario!=session('id_usuario')) or $i->tipo_usuario=="Cliente"){ ?>
                                <a href="<?php echo base_url().route_to('eliminar_usuario', $i->id_usuario) ?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#usuarios');
</script>
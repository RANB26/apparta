<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="titulo mx-auto">
                    <h2><i class='bx bxs-user-detail mx-2'></i>Gestionar <b>Usuarios</b></h2>
                </div>
            </div>
            <table class="table table-striped table-hover" id="usuarios">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres</th>						
                        <th>Apellidos</th>
                        <th>Tipo usuario</th>
                        <th>Telefono</th>
                        <th>F. nacimiento</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $i){ ?>
                    <tr>
                        <td><?php echo $i->id_usuario ?></td>
                        <td><a href="<?php echo base_url().'gesusuarios/usuario/'.$i->id_usuario ?>"><img src="<?php echo base_url(); ?>/img/perfil.jpg" class="avatar" alt="Avatar"><?php echo $i->nombre_usuario?></a></td>
                        <td><?php echo $i->apellido_usuario ?></td>
                        <td><?php echo $i->tipo_usuario ?></td>
                        <td><?php echo $i->celular_usuario ?></td> 
                        <td><?php echo $i->fnacimiento_usuario ?></td>
                        <td><?php echo $i->correo_usuario ?></td>                        
                        <td>
                            <a href="<?php echo base_url().'gesusuarios/usuario/'.$i->id_usuario ?>" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <?php if((session('tipo_usuario')=='SuperAdmin' and $i->id_usuario!=session('id_usuario')) or $i->tipo_usuario=="Usuario"){ ?>
                                <a href="<?php echo base_url().'eliminarusuario/'.$i->id_usuario ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div> -->
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#usuarios');
</script>
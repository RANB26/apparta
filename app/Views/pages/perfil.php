<section class="fondo-perfil" style="background-color: #eee;">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-lg-4">
                <div class="card mb-4 cuadros">
                    <div class="card-body text-center">
                        <img src="<?php echo base_url(); ?>/img/perfil.jpg" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">
                            <?php echo session('nombre_usuario'); ?>
                            <?php echo session('apellido_usuario'); ?>
                        </h5>
                        <h6 class="text-muted mb-1"><?php echo session('tipo_usuario'); ?></h6>
                        <div class=" mt-3"><a href="<?php echo base_url().'actualizarmiperfil/'.session('id_usuario') ?>" class="btn btn-primary actualizar px-4">Editar</a></div>
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
                            <h6 class="text-muted mb-0"><?php echo session('nombre_usuario'); ?></h6>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Apellidos</h6>
                        </div>
                        <div class="col-sm-9">
                            <h6 class="text-muted mb-0"><?php echo session('apellido_usuario'); ?></h6>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Correo Electronico</h6>
                        </div>
                        <div class="col-sm-9">
                            <h6 class="text-muted mb-0"><?php echo session('correo_usuario'); ?></h6>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Teléfono</h6>
                        </div>
                        <div class="col-sm-9">
                            <h6 class="text-muted mb-0"><?php echo session('celular_usuario'); ?></h6>
                        </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <br>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="fondo-perfil" style="background-color: #eee;">
    <div class="container py-5">
    
        <div class="row">
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
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">F. de Nacimiento</h6>
                        </div>
                        <div class="col-sm-9">
                            <h6 class="text-muted mb-0"><?php echo session('fnacimiento_usuario'); ?></h6>
                        </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-md-12  mb-3">
                <div class="card mb-4 mb-md-0 cuadros">
                    <div class="card-body">
                        <div class="section-title">
                            <h2>Mis viviendas publicadas</h2>
                        </div>
                        <div class="row portfolio justify-content-center py-2 px-4">
                            <?php foreach($viviendas_publicadas as $i){ ?>
                                <div class="col-lg-3 col-md-5 mx-3 my-3">
                                    <div class="opciones">
                                        <div class="valoracion">
                                            <a href="<?php echo base_url().'eliminarmivivienda/'.$i->id_vivienda ?>" style='margin: 25px 8px 0 0'>
                                                <i id="actualizar-<?php echo $i->id_vivienda ?>" class="fas fa-trash" style='color: #d9300c'></i>
                                            </a>
                                            <a href="<?php echo base_url().'actualizarmivivienda/'.$i->id_vivienda ?>" style='margin: 25px 8px 0 0'>
                                                <i id="actualizar-<?php echo $i->id_vivienda ?>" class="fas fa-pencil-alt" style='color: #deda0a'></i>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url().'vivienda/'.$i->id_vivienda ?>" class="col-lg-3 col-md-5 mx-4 my-2 p-0">
                                        <div class="card">
                                            <img src="<?php echo base_url();?>/img/vivienda.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title precio_vivienda"><b>$<?php echo $i->precio_vivienda ?></b> COP</h5>
                                                <h6 class="card-text mt-3"><?php echo $i->numhabitaciones_vivienda ?> hab - <?php echo $i->numbaño_vivienda ?> baño - <?php echo $i->area_vivienda ?>m2</h6>
                                                <h6 class="card-text mt-2"><?php echo $i->direccion_vivienda ?></h6>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Publicada hace 
                                                    <?php
                                                        date_default_timezone_set('America/Bogota');
                                                        $tiempo1 = date_create($i->fpublicacion_vivienda);
                                                        $tiempo2 = date_create(getdate()['year']."-".getdate()['mon']."-".getdate()['mday']." ".getdate()['hours'].":".getdate()['minutes'].":00");
                                                        $intervalo = date_diff($tiempo1, $tiempo2);

                                                        $tiempo = array();

                                                        foreach ($intervalo as $valor){
                                                            $tiempo[]=$valor;
                                                        }
                                                        
                                                        if($tiempo[0]>0){
                                                            echo $tiempo[0]." años";
                                                        }else if($tiempo[1]>0){
                                                            echo $tiempo[1]." meses";
                                                        }else if($tiempo[2]>0){
                                                            echo $tiempo[2]." dias";
                                                        }else if($tiempo[3]>0){
                                                            echo $tiempo[3]." horas";
                                                        }else{
                                                            echo $tiempo[4]." minutos";
                                                        }

                                                    ?>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-4 mb-md-0 cuadros">
                    <div class="card-body">
                        <div class="section-title">
                            <h2>Favoritos</h2>
                        </div>
                        <div class="row portfolio justify-content-center py-2 px-4">
                            <?php foreach($viviendas_favoritas as $j){ ?>
                                <div class="col-lg-3 col-md-5 mx-3 my-3">
                                    <div class="opciones">
                                        <div class="valoracion">
                                            <button  onclick="Favoritos(<?php echo $j->id_vivienda ?>)">
                                                <i id="iFavoritos<?php echo $j->id_vivienda ?>" class="fas fa-star activado"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url().'vivienda/'.$j->id_vivienda ?>" class="my-2 p-0">
                                        <div class="card">
                                            <img src="<?php echo base_url();?>/img/vivienda.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title precio_vivienda"><b>$<?php echo $j->precio_vivienda ?></b> COP</h5>
                                                <h6 class="card-text mt-3"><?php echo $j->numhabitaciones_vivienda ?> hab - <?php echo $j->numbaño_vivienda ?> baño - <?php echo $j->area_vivienda ?>m2</h6>
                                                <h6 class="card-text mt-2"><?php echo $j->direccion_vivienda ?></h6>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Publicada hace 
                                                    <?php
                                                        date_default_timezone_set('America/Bogota');
                                                        $tiempo1 = date_create($j->fpublicacion_vivienda);
                                                        $tiempo2 = date_create(getdate()['year']."-".getdate()['mon']."-".getdate()['mday']." ".getdate()['hours'].":".getdate()['minutes'].":00");
                                                        $intervalo = date_diff($tiempo1, $tiempo2);

                                                        $tiempo = array();

                                                        foreach ($intervalo as $valor){
                                                            $tiempo[]=$valor;
                                                        }
                                                        
                                                        if($tiempo[0]>0){
                                                            echo $tiempo[0]." años";
                                                        }else if($tiempo[1]>0){
                                                            echo $tiempo[1]." meses";
                                                        }else if($tiempo[2]>0){
                                                            echo $tiempo[2]." dias";
                                                        }else if($tiempo[3]>0){
                                                            echo $tiempo[3]." horas";
                                                        }else{
                                                            echo $tiempo[4]." minutos";
                                                        }

                                                    ?>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url();?>/js/viviendas.js"></script>
<script type="text/javascript">

    let mensaje = '<?php echo $mensaje ?>';
    if(mensaje=='error_propietario'){
        Swal.fire('Error','Usted no es el propietario de esta vivienda','error');
    }else if(mensaje=='vivienda eliminada'){
        Swal.fire('¡Vivienda eliminada!','','success');
    }else if(mensaje=='error_vivienda'){
        Swal.fire('¡Error!','No se pudo eliminar la vivienda','error');
    }

</script>


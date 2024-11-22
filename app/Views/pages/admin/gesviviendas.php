<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="titulo mx-auto">
                    <h2><i class="bx bxs-home mx-1"></i> Gestionar <b>Viviendas</b></h2>
                </div>
            </div>
            <table class="table table-striped table-hover" id="viviendas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Dirección</th>
                        <th>F. publicación</th>						
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>Area</th>
                        <th>Estrato</th>
                        <th># hab</th>
                        <th># baños</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($viviendas as $i){ ?>
                        <td><?php echo $i->id_vivienda ?></td>
                        <td><?php echo $i->direccion_vivienda ?></td>
                        <td><?php echo $i->fpublicacion_vivienda ?></td>
                        <td><?php echo $i->tipo_vivienda ?></td>
                        <td><?php echo "$".$i->precio_vivienda ?></td>
                        <td><?php echo $i->estado_vivienda ?></td> 
                        <td><?php echo $i->area_vivienda ?></td>
                        <td><?php echo $i->estrato_vivienda ?></td></td>
                        <td><?php echo $i->numhabitaciones_vivienda ?></td>
                        <td><?php echo $i->numbaño_vivienda ?></td>
                        <td><?php echo $i->id_usuario ?></td>                        
                        <td>
                            <a href="<?php echo base_url().'gesviviendas/vivienda/'.$i->id_vivienda ?>" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="<?php echo base_url().'eliminarvivienda/'.$i->id_vivienda ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
    let table = new DataTable('#viviendas');
</script>
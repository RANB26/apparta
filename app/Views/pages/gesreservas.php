<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="titulo mx-auto">
                    <h2><i class="bx bxs-calendar mx-1"></i> Gestionar <b>Reservas</b></h2>
                </div>
            </div>
            <table class="table table-striped table-hover" id="mesas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Mesa</th>
                        <th>Tipo</th>
                        <th>Personas</th>
                        <th>Fecha inico</th>
                        <th>Fecha fin</th>
                        <th>Estado</th>
                        <th>Registrada</th>
                        <th>Registra</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($reservas as $i){ ?>
                        <td><?php echo $i->id_reserva ?></td>
                        <td><?php echo $i->nombre_cliente." "."$i->apellido_cliente" ?></td>
                        <td><?php echo $i->id_mesa ?></td>                  
                        <td><?php echo $i->tipo_mesa ?></td>                  
                        <td><?php echo $i->num_personas ?></td>                  
                        <td><?php echo $i->fecha_inicio ?></td>                  
                        <td><?php echo $i->fecha_fin ?></td>                  
                        <td><?php echo $i->estado_reserva ?></td>     
                        <td><?php echo $i->fecha_registra ?></td>             
                        <td><?php echo $i->nombre_registra." ". $i->apellido_registra ?></td>                  
                        <td>
                            <a href="<?php echo base_url().route_to('gesreserva', $i->id_reserva) ?>" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="<?php echo base_url().route_to('cancelar_reserva', $i->id_reserva) ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xe5cd;</i></a>
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
    let table = new DataTable('#mesas');
</script>
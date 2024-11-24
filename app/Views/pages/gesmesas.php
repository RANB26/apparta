<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="titulo mx-auto">
                    <h2><i class="material-icons">&#xeac6;</i> Gestionar <b>Mesas</b></h2>
                </div>
            </div>
            <table class="table table-striped table-hover" id="mesas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($mesas as $i){ ?>
                        <td><?php echo $i->id_mesa ?></td>
                        <td><?php echo $i->tipo_mesa ?></td>
                        <td><?php echo $i->estado_mesa ?></td>                  
                        <td>
                            <a href="<?php echo base_url().route_to('gesmesa', $i->id_mesa) ?>" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
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
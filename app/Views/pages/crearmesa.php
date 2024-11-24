<div class="container-fluid py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card my-5">
                <div class="table-title">
                    <div class="titulo mx-auto">
                        <h2>Crear <b>Mesa</b></h2>
                    </div>
                </div>
                <form class="form-card p-5 formulario" method="POST" action="<?php echo base_url().route_to('insertar_mesa') ?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Tipo de mesa<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="id_tipo_mesa">
                                <?php foreach($tipos_mesa as $tipo_mesa){
                                    echo "<option value='".$tipo_mesa->id_tipo_mesa."'>".$tipo_mesa->tipo_mesa."</option>";
                                } ?>
                            </select>            
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Estado<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="estado_mesa">
                                <option value='Disponible'>Disponible</option>
                                <option value='Ocupada'>Ocupada</option>
                            </select>            
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="form-group col-sm-6"> 
                            <button type="submit" class="btn btn-primary px-5">Crear</button> 
                        </div>
                        <div class="form-group col-sm-6"> 
                            <a href="<?php echo base_url().route_to('gesmesas') ?>" class="btn btn-primary px-5">Volver</a> 
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
        Swal.fire('¡Registrada!','Mesa creada con éxito','success');
    }
</script>
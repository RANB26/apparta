<div class="container-fluid py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card my-5">
                <div class="table-title">
                    <div class="titulo mx-auto">
                        <h2>Actualizar <b>Mesa</b></h2>
                    </div>
                </div>
                <form class="form-card p-5 formulario" method="POST" action="<?php echo base_url().route_to('actualizar_mesa') ?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">ID Mesa<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="id_mesa" value="<?php echo $info_mesa['id_mesa']?>" readonly>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Tipo de mesa<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="id_tipo_mesa">
                                <?php foreach($tipos_mesa as $tipo_mesa){
                                    $selected = '';
                                    if($info_mesa['id_tipo_mesa'] == $tipo_mesa->id_tipo_mesa) $selected = 'selected';
                                    echo "<option value='".$tipo_mesa->id_tipo_mesa."' $selected >".$tipo_mesa->tipo_mesa."</option>";
                                } ?>
                            </select>            
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Estado<span class="text-danger"> *</span></label> 
                            <select class="form-select" name="estado_mesa">
                                <option value='Disponible' <?php if($info_mesa['estado_mesa']=='Disponible'){echo 'selected'; }?>>Disponible</option>
                                <option value='Ocupada' <?php if($info_mesa['estado_mesa']=='Ocupada'){echo 'selected'; }?> >Ocupada</option>
                            </select>            
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="form-group col-sm-6"> 
                            <button type="submit" class="btn btn-primary px-5">Editar</button> 
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
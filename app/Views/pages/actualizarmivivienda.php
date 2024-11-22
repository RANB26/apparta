<div class="container-fluid py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card my-5">
                <div class="table-title">
                    <div class="titulo mx-auto">
                        <h2><i class="bx bxs-home mx-1"></i> Gestionar <b>Viviendas</b></h2>
                    </div>
                </div>
                <form class="form-card p-5 formulario" method="POST" action="<?php echo base_url().route_to('actualizar_vivienda_usuario') ?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">ID Vivienda<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="id_vivienda" value="<?php echo $info_vivienda[0]['id_vivienda']?>" readonly> 
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Usuario<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="id_usuario" value="<?php echo $info_vivienda[0]['id_usuario']?>" readonly>
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Tipo Vivienda<span class="text-danger"> *</span></label> 
                            <select class="form-control" name="tipo_vivienda" >
                                    <option value="Casa" <?php if($info_vivienda[0]['tipo_vivienda'] == 'Casa') echo 'selected' ?> >Casa</option>
                                    <option value="Apartamento" <?php if($info_vivienda[0]['tipo_vivienda'] == 'Apartamento') echo 'selected' ?>>Apartamento</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Precio<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="precio_vivienda" value="<?php echo $info_vivienda[0]['precio_vivienda']?>" min="300000" max="500000000" required> 
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> 
                            <label class="form-control-label px-3">Estado<span class="text-danger"> *</span></label> 
                            <select class="form-control" name="estado_vivienda" >
                                <option value="Desocupada" <?php if($info_vivienda[0]['estado_vivienda'] == 'Desocupada') echo 'selected' ?> >Desocupada</option>
                                <option value="Ocupada" <?php if($info_vivienda[0]['estado_vivienda'] == 'Ocupada') echo 'selected' ?>>Ocupada</option>
                            </select> 
                        </div>
                        <div class="form-group col-sm-4 flex-column d-flex"> <label class="form-control-label px-3">Fecha de publicación<span class="text-danger"> *</span></label> <input class="form-control" type="date time" name="fpublicacion_vivienda" value="<?php echo $info_vivienda[0]['fpublicacion_vivienda']?>" readonly> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Carrera<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="numcarrera_vivienda" value="<?php echo $info_vivienda[0]['numcarrera_vivienda']?>" min="1" max="150" required>
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Letra</label> 
                            <input class="form-control letra" type="text" name="letracarrera_vivienda" value="<?php echo $info_vivienda[0]['letracarrera_vivienda']?>" pattern="[A-Z]{1}" title="Solo debe ser una letra en mayúscula">
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Calle<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="numcalle_vivienda" value="<?php echo $info_vivienda[0]['numcalle_vivienda']?>" min="1" max="150" required>
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3"># Vivienda<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="num_vivienda" value="<?php echo $info_vivienda[0]['num_vivienda']?>" min="1" max="150" required>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Estrato<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="estrato_vivienda" value="<?php echo $info_vivienda[0]['estrato_vivienda']?>" min="1" max="6" required> 
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Area<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="area_vivienda" value="<?php echo $info_vivienda[0]['area_vivienda']?>" min="25" max="100" required> 
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Baños<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="numbaño_vivienda" value="<?php echo $info_vivienda[0]['numbaño_vivienda']?>" min="1" max="4" required> 
                        </div>
                        <div class="form-group col-sm-3 flex-column d-flex"> 
                            <label class="form-control-label px-3">Habitaciones<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="number" name="numhabitaciones_vivienda" value="<?php echo $info_vivienda[0]['numhabitaciones_vivienda']?>" min="1" max="6" required> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Latitud</label> 
                            <input id="latitud" class="form-control" type="text" name="latitud_vivienda" value="<?php echo $info_vivienda[0]['latitud_vivienda']?>" readonly>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Longitud</label>
                            <input id="longitud" class="form-control" type="text" name="longitud_vivienda" value="<?php echo $info_vivienda[0]['longitud_vivienda']?>" readonly>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex"> 
                            <label class="form-control-label px-3">Descripción</label> 
                            <input class="form-control" type="text" name="descripcion_vivienda" value="<?php echo $info_vivienda[0]['descripcion_vivienda']?>" maxlength="250"> 
                        </div>
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
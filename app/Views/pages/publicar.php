<div class="container-fluid py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card my-5">
                <div class="table-title">
                    <div class="titulo mx-auto">
                        <h2><i class="bx bxs-home mx-1"></i> Publicar mi <b>Vivienda</b></h2>
                    </div>
                </div>
                <form class="form-card p-5 formulario" method="POST" action="<?php echo base_url().route_to('crear_vivienda') ?>">
                    <input class="form-control" type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tipo Vivienda<span class="text-danger"> *</span></label> <select class="form-control" name="tipo_vivienda"> <option value="Casa">Casa</option><option value="Apartamento">Apartamento</option></select></div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Precio<span class="text-danger"> *</span></label> <input class="form-control" type="number" name="precio_vivienda" min="300000" max="500000000" required> </div>
                        
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Carrera<span class="text-danger"> *</span></label> <input class="form-control" type="number" name="numcarrera_vivienda" min="1" max="150" required></div>
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Letra</label> <input class="form-control" type="text" name="letracarrera_vivienda" pattern="[A-Z]{1}" title="Solo debe ser una letra en mayúscula"></div>
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Calle<span class="text-danger"> *</span></label> <input class="form-control" type="number" name="numcalle_vivienda" min="1" max="150" required></div>
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3"># Vivienda<span class="text-danger"> *</span></label> <input class="form-control" type="number" name="num_vivienda" min="1" max="150" required></div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Estrato<span class="text-danger"> *</span></label> <input class="form-control" type="number" name="estrato_vivienda" min="1" max="6" required></div>
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Area<span class="text-danger"> *</span></label> <input class="form-control" type="number" name="area_vivienda" min="25" max="100" required></div>
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Baños<span class="text-danger"> *</span></label> <input class="form-control" type="number" name="numbaño_vivienda" min="1" max="4" required></div>
                        <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Habitaciones<span class="text-danger"> *</span></label> <input class="form-control" type="number" name="numhabitaciones_vivienda" min="1" max="6" required></div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex"> <label class="form-control-label px-3">Descripción</label> <input class="form-control" type="text" name="descripcion_vivienda" maxlength="250"></div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <span>Seleccione la ubicacion en el mapa</span><br><br>
                        <div class="form-group col-sm-6 flex-column d-flex"> <input id="latitud" class="form-control" type="hidden" name="latitud_vivienda" readonly></div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <input id="longitud" class="form-control" type="hidden" name="longitud_vivienda" readonly></div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group flex-column d-flex"> 
                            <div id="mapa" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn btn-primary px-5">Publicar</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url();?>/js/mapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMapa"></script>
<div class="row viviendas">
    <div class="col-7 viviendas-scroll">
        <div class="section-title">
            <h2>Viviendas</h2>
            <p>Viviendas disponibles</p>
        </div>
        <div class="row portfolio listaviviendas-scroll">
            <?php foreach($viviendas as $i){ ?>
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 py-3">
                    <div class="opciones">
                        <div class="valoracion">
                            <button  onclick="Favoritos(<?php echo $i->id_vivienda ?>)">
                                <i id="iFavoritos<?php echo $i->id_vivienda ?>" class="fas fa-star <?php foreach($favoritos as $j){ if ($j->id_vivienda==$i->id_vivienda){ echo "activado"; }}?>"></i>
                            </button>
                        </div>
                    </div>
                    <a href="<?php echo base_url().'vivienda/'.$i->id_vivienda ?>">
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
    <div class="col-5">
        <div id="mapa"></div>
    </div>
</div>
<script src="<?php echo base_url();?>/js/viviendas.js"></script>
<script src="<?php echo base_url();?>/js/mapa_viviendas.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik"></script>
<script>

    function formatoPeso(number) {
        return new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(number);
    }

    function initMap() {
        // Array de ubicaciones con latitudes y longitudes
        const infoViviendas = JSON.parse('<?php echo json_encode($viviendas) ?>')
        const locations = infoViviendas.map(({ id_vivienda, latitud_vivienda, longitud_vivienda, tipo_vivienda, precio_vivienda }) => ({
            lat: parseFloat(latitud_vivienda),
            lng: parseFloat(longitud_vivienda),
            info: tipo_vivienda + ' - ' + formatoPeso(precio_vivienda),
            url: 'http://localhost/houslys/public/vivienda/'+id_vivienda
        }));

        // Crear el mapa centrado en la primera ubicación
        const latitud = 10.912759628542808;
        const longitud = -74.80153090165516;

        var map = new google.maps.Map(document.getElementById('mapa'),
        {
            zoom: 16,
            center: new google.maps.LatLng(latitud, longitud)
        });

        // Crear un InfoWindow (una sola instancia que reutilizaremos)
        const infoWindow = new google.maps.InfoWindow();

        // Añadir los marcadores al mapa
        locations.forEach((location) => {
            const marker = new google.maps.Marker({
                position: { lat: location.lat, lng: location.lng },
                map: map,
            });

            // Mostrar el InfoWindow al pasar el mouse
            marker.addListener("mouseover", () => {
                // Personalizar contenido del InfoWindow con estilo
                const content = `
                    <div style="width: 250px; font-family: Arial, sans-serif;">
                        <h3 style="margin: 0; font-size: 18px;">${location.info}</h3>
                        <p style="margin: 5px 0; font-size: 14px;">Haz clic para más información.</p>
                    </div>`;
                infoWindow.setContent(content);
                infoWindow.open(map, marker);
            });

            // Ocultar el InfoWindow al mover el mouse fuera del marcador
            marker.addListener("mouseout", () => {
                infoWindow.close();
            });

            // Redirigir al enlace al hacer clic en el marcador
            marker.addListener("click", () => {
                window.open(location.url, "_blank");
            });
        });

    }

    // Cargar el mapa cuando la página esté lista
    window.onload = initMap;
</script>

function iniciarMapa(){
    var latitud = 10.912759628542808;
    var longitud = -74.80153090165516;

    coordenadas = { lng: longitud, lat: latitud}

    generarMapa(coordenadas);

}

function generarMapa(coordenadas){
    var mapa = new google.maps.Map(document.getElementById('mapa'),
    {
        zoom: 16,
        center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });

    marcador = new google.maps.Marker({
        map: mapa,
        draggable: true,
        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });

    marcador.addListener('dragend', function(event){
        document.getElementById("latitud").value = this.getPosition().lat();
        document.getElementById("longitud").value = this.getPosition().lng();
    });
}
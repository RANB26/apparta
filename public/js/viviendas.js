window.onload = function() {
    const precio = document.getElementsByClassName("precio_vivienda");
    for (let i = 0; i < precio.length; i++) {
        const punto = precio[i];
        let numero = punto.textContent;
        numero = numero.substring(1, numero.indexOf(" COP"))
        let a = 0;
        for (let i = numero.length-1; i > 0; i--) {
            a++;
            if (a == 3) {
                numero = numero.substring(0,i)+"."+numero.substring(i);
                a = 0;
            }
            
        }
        punto.textContent = "$"+numero+" COP";
    }
}

function Favoritos(idVivienda){

    $.ajax({
        type: "POST",
        url: "http://localhost/houslys/public/favorito",
        data: {id_vivienda: idVivienda},
        success: function (res) {

            if(res=="1"){
                $('#iFavoritos'+idVivienda).addClass("activado");
            }else{
                $('#iFavoritos'+idVivienda).removeClass("activado");
            }

        }
    });

}
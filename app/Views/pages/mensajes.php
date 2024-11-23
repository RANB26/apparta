<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

    var mensaje = '<?php echo $mensaje ?>';

    if(mensaje=='registro actualizado'){
        Swal.fire('¡Información actualizada!','Se ha actualizado con exito','success');
    }
    else if(mensaje=='reservada'){
        Swal.fire('¡Se ha reservado la mesa!','','success');
    }
    else if(mensaje=='usuario eliminado'){
        Swal.fire('¡Usuario eliminado!','','success');
    }
    else if(mensaje=='vivienda eliminada'){
        Swal.fire('¡Vivienda eliminada!','','success');
    }
    else if(mensaje=='inicia sesion'){
        Swal.fire('¡Debe iniciar sesión primero!','','error');
    } 
    else if(mensaje=='error'){
        Swal.fire('¡Error!','Ha ingresado datos incorrectos','error');
    }
    else if(mensaje=='permisos'){
        Swal.fire('¡Error!','No tiene permisos para ingresar a esta ruta','error');
    }

</script>

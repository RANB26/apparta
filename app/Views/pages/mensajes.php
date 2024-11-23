<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

    var mensaje = '<?php echo $mensaje ?>';

    if(mensaje=='registro actualizado'){
        Swal.fire('¡Información actualizada!','Se ha actualizado con éxito','success');
    }
    else if(mensaje=='reservada'){
        Swal.fire('¡Se ha reservado la mesa!','','success');
    }
    else if(mensaje=='usuario eliminado'){
        Swal.fire('¡Usuario eliminado!','','success');
    }
    else if(mensaje=='mesa eliminada'){
        Swal.fire('¡Mesa eliminada!','','success');
    }
    else if(mensaje=='inicia sesion'){
        Swal.fire('¡Debe iniciar sesión primero!','','error');
    } 
    else if(mensaje=='error'){
        Swal.fire('¡Error!','Ha ingresado datos incorrectos','error');
    }
    else if(mensaje=='permisos'){
        Swal.fire('¡Error!','No tiene permisos para ingresar a esta ruta','error');
    }else if(mensaje=='error_usuario'){
        Swal.fire('¡Error!','Ocurrió un error al eliminar el usuario','error');
    }else if(mensaje=='error_reservas'){
        Swal.fire('¡Error!','Ocurrió un error al eliminar las reservas del usuario','error');
    }

</script>

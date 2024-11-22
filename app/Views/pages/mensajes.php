<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

		let mensaje = '<?php echo $mensaje ?>';

		if(mensaje=='registro actualizado'){
			Swal.fire('¡Información actualizada!','Se ha actualizado con exito','success');
		}
        else if(mensaje=='vivienda publicada'){
        Swal.fire('¡Se ha publicado tu vivienda!','','success');
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

</script>

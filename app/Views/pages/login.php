<!doctype html>
<html lang="es">
<head>
    <title><?php echo $titulo ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url();?>/img/Logo.png" rel="icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url();?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>/css/login.css">
</head>
<body>
    <div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Iniciar sesión</h4>
											<form method="POST" action="<?php echo base_url().route_to('ingresar') ?>">
												<div class="form-group">
													<input type="email" class="form-style" name="correo_usuario" placeholder="Correo electronico">
													<i class="input-icon uil uil-at"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" class="form-style" name="password_usuario" placeholder="Contraseña">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button href="<?php echo base_url().route_to('perfil') ?>" class="btn mt-4">Entrar</button>
											</form>
											<br>
											<p><a href="<?php echo base_url() ?>" class="regresar mt-4">Regresar al inicio</a></p>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">

		let mensaje = '<?php echo $mensaje ?>';

		if(mensaje=='inicia sesion'){
			Swal.fire('¡Debe iniciar sesión!','','error');
		} else if(mensaje=='error'){
			Swal.fire('¡Error!','Ha ingresado datos incorrectos','error');
		}else if(mensaje=='error_cliente'){
			Swal.fire('¡Error!','Los clientes no pueden acceder a la página','error');
		}else if(mensaje=='no_encontrado'){
			Swal.fire('¡Error!','Usuario no encontrado','error');
		}
	</script>

</body>
</html>
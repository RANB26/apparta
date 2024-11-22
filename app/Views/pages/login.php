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
						<h6 class="mb-0 pb-3"><span>Iniciar sesión </span><span>Crear cuenta</span></h6>
			        	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			            <label for="reg-log"></label>
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
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-3">Crear cuenta</h4>
											<form method="POST" action="<?php echo base_url().route_to('crear_usuario') ?>">
												<div class="row">
													<div class="col-lg-6 form-group">
														<input type="text" class="form-style" name="nombre_usuario" placeholder="Nombres" required>
														<i class="input-icon uil uil-user"></i>
													</div>	
													<div class="col-lg-6 form-group">
														<input type="text" class="form-style" name="apellido_usuario" placeholder="Apellidos" required>
														<i class="input-icon uil uil-user"></i>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6 form-group">
														<input type="tel" class="form-style" name="celular_usuario" placeholder="Teléfono" minlength="10" maxlength="10" required>
														<i class="input-icon uil uil-phone"></i>
													</div>
													<div class="col-lg-6 form-group">
														<input type="date" class="form-style" name="fnacimiento_usuario" placeholder="Fecha de nacimiento" required>
														<i class="input-icon uil uil-calendar-alt"></i>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-6 form-group">
														<input type="email" class="form-style" name="correo_usuario" placeholder="E-mail" required>
														<i class="input-icon uil uil-at"></i>
													</div>
													<div class="col-lg-6 form-group">
														<input type="password" class="form-style" name="password_usuario" placeholder="Contraseña" required>
														<i class="input-icon uil uil-lock-alt"></i>
													</div>
												</div>
												<button class="btn mt-4">Registrarse</button>
											</form>
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

		if(mensaje=='registrado'){
			Swal.fire('¡Bienvenido!','Se ha registrado con exito','success');
		}else if(mensaje=='inicia sesion'){
			Swal.fire('¡Debe iniciar sesión!','','error');
		} else if(mensaje=='error'){
			Swal.fire('¡Error!','Ha ingresado datos incorrectos','error');
		}

	</script>

</body>
</html>
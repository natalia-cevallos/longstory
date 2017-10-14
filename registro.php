<?php
	session_start();

	require_once('register-login/funciones.php');

	if(estaLogueado()){
		header('Location: perfil-usuario.php'); exit;
	}

	$sexos = [
		'F' => 'Femenino',
		'M' => 'Masculino',
		'O'=>'Otro'
	];

	$nombre = '';
	$apellido = '';
	$email = '';
	$username = '';
	$telefono = '';

	if ($_POST) {

		// Persistencia
		$nombre = $_POST['name'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$usuario = $_POST['usuario'];
		$telefono = $_POST['telefono'];

		// Validación - La función validarUsuario retorna un array
		$erroresFinales = validarUsuario($_POST, $_FILES);

		if (empty($erroresFinales)) {

			// Si no hay errores en POST 1ero ejecuto la función de guardar la imagen
			$erroresFinales = guardarImagen('avatar', $erroresFinales);

			// Vuelvo a preguntar si el array de errores está vació
			if (empty($erroresFinales)) {
				// Creo Usuario en ARRAY, $usuarioAGuardar recibe el return de la función crear usuario, que es un array asociativo que armé como yo quería.
				$usuarioAGuardar = crearUsuario($_POST);

				// Guardo Usuario en JSON, recibe el array guardado en la variable de arriba
				guardarUsuario($usuarioAGuardar);

				// Ok guardado, redireccionado
				header('location: register-ok.php'); exit;
			}
		}
	}

	$tituloDePagina = 'Registro de Usuarios';
	require_once('includes/head.php');
?>

<br>
<br>
<br>
		<form action="registrar.php" method="post" class="form-register">
				<h2 class="form-titulo"> CREA UNA CUENTA </h2>
				<div class="contenedor-inputs">
					<input type="text" name="nombre" placeholder="Nombres" class="input-48" required>
					<input type="text" name="apellido" placeholder="Apellidos" class="input-48"required>
					<input type="email" name="email" placeholder="Correo" class="input-100"required>
					<input type="text" name="usuario" placeholder="Usuario" class="input-48"required>
					<input type="text" name="telefono" placeholder="Telefono" class="input-48"required>
					<input type="password" name="pass" placeholder="Contraseña" class="input-100"required>
					<input type="password" name="repass" placeholder="Repetir Contraseña" class="input-100"required>
					<input type="submit" value="Registrar" class="btn-enviar">
					<p class="form-link"> ¿Ya tienes una cuenta? <a href="login.php"> Ingresa aquí </a></p>
				</div>
		</form>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>





<?php
	include_once ("includes/end.php");
?>

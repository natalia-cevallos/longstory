<?php
	session_start();

	require_once('register-login/funciones.php');

	if(estaLogueado()){
		header('Location: register-login/perfil-usuario.php'); exit;
	}

	$sexos = [
		'F' => 'Femenino',
		'M' => 'Masculino',
		'O'=>'Otro'
	];

	$nombre = '';
	$apellido = '';
	$email = '';
	$nickname = '';
	$telefono = '';

	if ($_POST) {

		// Persistencia
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$nickname = $_POST['nickname'];
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
				header('location: register-login/register-ok.php'); exit;
			}
		}
	}

	$tituloDePagina = 'Registro de Usuarios';
	require_once('includes/head.php');
?>

<br>
<br>
<br>
		<form method="post" class="form-register" enctype="multipart/form-data">
				<h2 class="form-titulo"> CREA UNA CUENTA </h2>
				<div class="contenedor-inputs">
					<input type="text" name="nombre" value="<?=$nombre;?>" placeholder="ej. Juan" class="input-48" required>
					<?php if (isset($erroresFinales['nombre'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['nombre'];?></span>
					<?php endif; ?>
					
					<input type="text" name="apellido" value="<?=$apellido;?>" placeholder="ej. Gomez" class="input-48"required>
					<?php if (isset($erroresFinales['apellido'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['apellido'];?></span>
					<?php endif; ?>
					
					<input type="text" name="email" value="<?=$email;?>" placeholder="ej. juang@.tucorreo.com" class="input-100"required>
					<?php if (isset($erroresFinales['email'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['email'];?></span>
					<?php endif; ?>
					
					<input type="text" name="nickname" value="<?=$nickname;?>" placeholder="nickname" class="input-48"required>
					<?php if (isset($erroresFinales['nickname'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['nickname'];?></span>
					<?php endif; ?>
					
					<input type="text" name="telefono" value="<?=$telefono;?>" placeholder="Telefono" class="input-48"required>
					<?php if (isset($erroresFinales['telefono'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['telefono'];?></span>
					<?php endif; ?>
					
					<input type="password" name="pass" placeholder="Contraseña" class="input-100"required>
					<?php if (isset($erroresFinales['pass'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['pass'];?></span>
					<?php endif; ?>
					
					<input type="password" name="repass" placeholder="Repetir Contraseña" class="input-100"required>
					<?php if (isset($erroresFinales['repass'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['repass'];?></span>
					<?php endif; ?>
					
					<select class="input-48" name="sexo">
						<option value="">Indicar Sexo</option>
						<?php foreach ($sexos as $letra => $valor): ?>
							<?php if (isset($_POST['sexo']) && $_POST['sexo'] == $letra): ?>
								<option selected value="<?=$letra;?>"><?=$valor;?></option>
							<?php else: ?>
								<option value="<?=$letra;?>"><?=$valor;?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
					<?php if (isset($erroresFinales['sexo'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['sexo'];?></span>
					<?php endif; ?>
					<br>				
					
					<input type="file" name="avatar" multiple class="input-48">
					<?php if (isset($erroresFinales['imagen'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['imagen'];?></span>
					<?php endif; ?>

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

		<?php if (isset($erroresFinales) && !empty($erroresFinales)): ?>
			<div class="div-errores">
				<ul>
					<?php foreach ($erroresFinales as $clave => $error): ?>
						<li> <?=$error?> </li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>




<?php
	include_once ("includes/end.php");
?>

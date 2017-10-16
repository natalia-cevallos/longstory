<?php
	session_start();

	require_once('register-login/funciones.php');

	if(estaLogueado()){
		header('Location: register-login/perfil-usuario.php'); exit;
	}

	if ($_POST) {

		// Validación - La función validarUsuario retorna un array
		$erroresFinales = validarLogin($_POST);

		if (empty($erroresFinales)) {
			// Guardo en la variable $usuario los datos del usuario que se quiere loguear
	      $usuario = comprobarEmail($_POST["email"]);

		 	// Guardo al ID del usuario en $_SESSION.
	      loguear($usuario);

			// Ok redirecciono
			header('location: index.php'); exit;
		}
	}

	$tituloDePagina = 'Login';
	require_once('includes/head.php');
?>

<br>
<br>
<br>
		<form method="post" class="form-register">
				<h2 class="form-titulo"> INGRESA </h2>
				<div class="contenedor-inputs">
					<input type="email" name="email" placeholder="Correo" class="input-100"required>
					<input type="password" name="pass" placeholder="Contraseña" class="input-100"required>
					<br>
					<?php if (isset($erroresFinales['email'])): ?>
						<span style="color: red;"><i class="ion-ios-close"></i></span>
						<span style="color: red;"><?=$erroresFinales['email'];?></span>
					<?php endif; ?>

					<br><br>
					<button type="submit" class="button">ENVIAR</button>
				</form>

				<?php if (isset($erroresFinales) && !empty($erroresFinales)): ?>
					<div class="div-errores">
						<ul>
							<?php foreach ($erroresFinales as $clave => $error): ?>
								<li> <?=$error?> </li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				</div>

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

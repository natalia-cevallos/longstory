<?php
	session_start();
	require_once('funciones.php');
	if(estaLogueado()){
		header('Location: perfil-usuario.php'); exit;
	}
		if (estaCookiado()) {
		header('Location: index.php'); exit;
		}

	if ($_POST) {
		$erroresFinales = validarLogin($_POST);
		if (empty($erroresFinales)) {
	      $usuario = comprobarEmail($_POST["email"]);
		  $recordarme= $_POST["recordar"];
	      loguear($usuario);
			($recordarme) ? cookiar($usuario):"";
		  header('location: perfil-usuario.php'); exit;
		}
	}
	$tituloDePagina = 'Login';
	require_once('includes/head.php');
?>
<br><br><br>
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
					<span class="input-48"><input type="radio" name="recordar" value="recordar">Recordarme</span>
					<input type="submit" value="Entrar" class="btn-enviar" >
			
					
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
<br><br><br><br><br><br><br><br><br><br>
<?php
	include_once ("includes/end.php");
?>

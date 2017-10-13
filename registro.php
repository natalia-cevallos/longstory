<?php
	require_once('includes/head.php');
?>

<br>
<br>
<br>
		<form action="registrar.php" method="post" class="form-register">
				<h2 class="form-titulo"> CREA UNA CUENTA </h2>
				<div class="contenedor-inputs">
					<input type="text" name="nombre" placeholder="Nombre" class="input-48" required>
					<input type="text" name="apellidos" placeholder="Apellidos" class="input-48"required>
					<input type="email" name="email" placeholder="Correo" class="input-100"required>
					<input type="text" name="usuario" placeholder="Usuario" class="input-48"required>
					<input type="password" name="pass" placeholder="Contraseña" class="input-48"required>
					<input type="text" name="telefono" placeholder="Telefono" class="input-100"required>
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

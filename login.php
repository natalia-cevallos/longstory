<?php
	require_once('includes/head.php');
?>

<br>
<br>
<br>
		<form action="registrar.php" method="post" class="form-register">
				<h2 class="form-titulo"> INGRESA </h2>
				<div class="contenedor-inputs">
					<input type="email" name="email" placeholder="Correo" class="input-100"required>
					<input type="text" name="usuario" placeholder="Usuario" class="input-100"required>
					<input type="password" name="pass" placeholder="Contraseña" class="input-100"required>
					<input type="password" name="pass" placeholder="Repetir Contraseña" class="input-100"required>
					<input type="submit" value="Entrar" class="btn-enviar">

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

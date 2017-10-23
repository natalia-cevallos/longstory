<?php
	session_start();
	require_once('funciones.php');
	if(!estaLogueado()){
		header('Location: login.php'); exit;
	}
	require_once('includes/head.php');
	$tituloDePagina ="Perfil del Usuario";
	$elUsuario = traerId($_SESSION['userId']);
	$laImagen = glob('images/avatares/' . $elUsuario['email'] . '*');
?>
		<h2>Hola <?=$elUsuario['name'];?> <?=$elUsuario['lastname'];?></h2>
		<em><?=$elUsuario['email'];?></em>
		<br><br>
		<img src="<?=$laImagen[0];?>" width="100" alt="avatar" style="border-radius: 50%;">
		<br><br>
		<a href="index.php" class="button">Volver al inicio</a>
		<a href="logout.php" class="button">Salir</a>
	</body>
</html>

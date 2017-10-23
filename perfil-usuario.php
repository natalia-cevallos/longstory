<?php
	session_start();

	require_once('funciones.php');

	if(!estaLogueado()){
		header('Location: login.php'); exit;
	}

	if (estaCookiado()) {
		$cookie = $_COOKIE['userid'];
		$usuario = traerId($cookie);
		loguear($usuario);
	}

	if (estaLogueado()) {
		$usuario = traerId($_SESSION['userId']);
		$laImagen = glob('images/avatares/' . $usuario['email'] . '*');
	}


	$tituloDePagina = 'Perfil del Usuario';
	require_once('includes/head.php');
?>
<?php
$elUsuario = traerId($_SESSION['userId']);
$laImagen = glob('images/avatares/' . $elUsuario['email'] . '*');
 ?>
	<img src="<?=$laImagen[0];?>" width="250" alt="avatar" style="border-radius: 50%;">
		<h2>Hola <?=$elUsuario['name'];?> <?=$elUsuario['lastname'];?></h2>
		<em><?=$elUsuario['email'];?></em>
		<br><br>
		<a href="index.php" class="button">Volver al inicio</a>
		<a href="logout.php" class="button">Salir</a>
	<?php
	include ('includes/end.php');
	?>

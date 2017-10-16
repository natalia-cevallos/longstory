<?php
	session_start();
 // Borra la cookie que almacena la sesión 
  if(isset($_COOKIE[session_name()])) { 
    setcookie(session_name(), '', time() - 42000, '/'); 
  } 
  // Finalmente, destruye la sesión 
	session_destroy();
	header('Location: index.php'); exit;

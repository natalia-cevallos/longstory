<?php
include_once('pdo/conexion.php');
include_once('funciones.php');


$db->beginTransaction();


         //busco el usuario
		$usuarios = traerTodosJson();
		$cantusuarios=count($usuarios);
		echo $cantusuarios ;
       foreach($usuarios as $unUsuario => $usuario){
			print_r( $usuarios);
//			print_r( $unUsuario);
//		   echo "<br>";
//			print_r( $usuario);	
//		   echo "<br>";

	   }
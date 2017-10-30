<?php

include_once('pdo/conexion.php');

$db->beginTransaction();

try{
	// solo la primera vez al crear una nueva base de datos
 // $db->query('DROP DATABASE IF EXISTS `longstory_db`;
 // CREATE SCHEMA longstory_db;');

 // $db->query('USE longstory_db;');

  $db->query('DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;');

  $db->commit();

  echo 'La Base de Datos se creó exitosamente';

}catch( PDOException $e ){
  $db->rollBack();
  echo 'El error fue->'.$e->getMessage();
}




 ?>

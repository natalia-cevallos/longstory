<?php

$dsn = 'mysql:host=localhost;dbname=longstory_db;charset=utf8mb4';
$db_user = 'root';
$db_pass = 'root';
$opciones = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );

try {
	$db = new PDO($dsn, $db_user, $db_pass, $opciones);
}catch( PDOException $e ){
	echo $e->getMessage();
	die();
}

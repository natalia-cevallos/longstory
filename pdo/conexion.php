<?php

$dsn = 'mysql:host=localhost;dbname=longstory_db;charset=utf8mb4';
$db_user = 'root';
$db_pass = '';
$opciones = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
try {
	$db = new PDO($dsn, $db_user, $db_pass, $opciones);
}catch( PDOException $e ){
	echo $e->getMessage();
	die();
}
  
function tableExist($pdo) {
	$table = "usuarios" ;
    // Try a select statement against the table
    // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
    try {
        $result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
    } catch (Exception $e) {
        // We got an exception == table not found
        return FALSE;
    }

    // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
    return $result !== FALSE;
}

function usuariosExist($pdo) {
	$table = "usuarios" ;
    // Try a select statement against the table
    // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
    try {
        $result = $pdo->query("SELECT COUNT(id) FROM $table WHERE id >= 2");
    } catch (Exception $e) {
        // We got an exception == table not found
        return FALSE;
    }

    // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
    return $result !== FALSE;
}

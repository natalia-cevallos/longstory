<?php
include_once('pdo/conexion.php');
include_once('funciones.php');


$db->beginTransaction();

try{

         //busco el usuario
		$usuarios = traerTodosJson();
		$x = 0 ; 
	while($x == 0) {
       foreach($usuarios as $unUsuario => $usuario){
//creo mi query
        	
        $stmt = $db->prepare("INSERT INTO usuarios (name, lastname, email, username, password, gender) VALUES ( ?,?,?,?,?,?);");
        $stmt->bindValue(':name', $usuario['name'], PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $usuario['lastname'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $usuario['email'], PDO::PARAM_STR);
        $stmt->bindValue(':username', $usuario['username'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $usuario['password'], PDO::PARAM_STR);
        $stmt->bindValue(':gender', $usuario['gender'], PDO::PARAM_STR);
        $stmt->execute( [
             $usuario['name'],
             $usuario['lastname'],
             $usuario['email'],
             $usuario['username'], //2017-10-10
             $usuario['password'],
             $usuario['gender']
            ] );
	}
$x++;
}
	  $db->commit();
	header ('Location: index.php');
  	echo 'La transferencia de Datos se hizo exitosamente';

}catch( PDOException $e ){
  $db->rollBack();
  echo 'El error fue->'.$e->getMessage();
}

?>

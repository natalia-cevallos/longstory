<?php
$a = ["a" =>1, "b"=>2,"c"=>"yo <3 JSON"];

echo "$a <br>";
$a = json_encode($a) ;
echo "$a <br>";
$b= json_decode($a,true);
echo "$b <br>";

echo $b["c"];

function dump($value) {
  echo "<pre>";
  var_dump($value);
  echo "<br>";
  print_r($value);
  echo "</pre>";
}

$datacat = file_get_contents("categorias.json") ;
$listacheck= json_decode($datacat,true);
dump($listacheck);

 ?>

<?php

include_once 'conexion.php';

$sql_leer = 'SELECT * FROM colores';

//Crear Variable
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();

$resultado = $gsent->fetchAll();

var_dump($resultado);

?>
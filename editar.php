<?php

$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];

include_once 'conexion.php';

$sql_editar = 'UPDATE colores SET color=?, descripcion=? WHERE id=?';
  $sentencia_editar = $pdo->prepare($sql_editar);
  $sentencia_editar->execute(array($color,$descripcion,$id));

  header('location:index.php');
?>


<?php

echo 'editar.php?id=1&color=success&descripcion=este es un color verde';

echo '<br>';

$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];

echo $id;
echo '<br>';
echo $color;
echo '<br>';
echo $descripcion;



?>
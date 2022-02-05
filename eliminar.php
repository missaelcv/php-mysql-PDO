<?php

include_once 'conexion.php';

$id = $_GET['id'];

$sql_eliminar = 'DELETE FROM colores WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));

//Cerramos conexion de la base de datos y sentencias
$pdo = null;
$sentencia_eliminar = null;


header('location:index.php');


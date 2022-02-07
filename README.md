## php-mysql-PDO
php-mysql PDO


<?php

```###include_once 'conexion.php';```

###Leer 
$sql_leer = 'SELECT * FROM colores';

###Crear Variable
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

var_dump($resultado);

###Agregar
 if($_POST) {
   $color = $_POST['color'];
   $descripcion = $_POST['descripcion'];

###Se agrego la funcion agregar con la tabla colores de la base de datos....

   $sql_agregar= 'INSERT INTO colores (color,descripcion) Value (?, ?)';
   
###Crear Variable para la sentencia SQL
  $sentencia_agregar = $pdo->prepare($sql_agregar);
  $sentencia_agregar->execute(array($color,$descripcion));

  ###Cerrar conexion a la base de datos y sentencias
  $sentencia_agregar = null;
  $pdo = null;  
  header('location:index.php');
 }

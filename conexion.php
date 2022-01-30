<?php

$link = 'mysql:host=localhost;dbname=yt_colores';
$usuario = 'root';
$pass = 'root';

try {
    
   $pdo = new PDO($link, $usuario, $pass);

   echo 'Conectado';

   foreach($mbd->query('SELECT * from colores') as $fila) {
    print_r($fila);
}

} catch (PDOException $e) {
    print "Error:" . $e->getMessage() . "<br/>";
    die();
}
?>
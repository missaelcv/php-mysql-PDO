 <?php

include_once 'conexion.php';
//Leer 
$sql_leer = 'SELECT * FROM colores';
//Crear Variable
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();
//var_dump($resultado);

 //Agregar
 if($_POST) {
   $color = $_POST['color'];
   $descripcion = $_POST['descripcion'];

   //se agrego la funcion agregar con la tabla colores de la base de datos....
   $sql_agregar= 'INSERT INTO colores (color,descripcion) Value (?, ?)';

  //Crear Variable para la sentencia SQL
  $sentencia_agregar = $pdo->prepare($sql_agregar);
  $sentencia_agregar->execute(array($color,$descripcion));
    
  header('location:index.php');
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
  <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php foreach($resultado as $dato): ?>

        <div 
        class="alert alert-<?php echo $dato['color'] ?> text-uppercase"  
        role="alert">

            <?php echo $dato ['color'] ?>
              -
            <?php echo $dato ['descripcion'] ?>
            </div>    

            <?php endforeach?>
            
          

           </div>
                  <div class="col-md-6">

                 <h2>Agregar elementos</h2>
                  <form method="POST">
                    <input type="text" class="form-control" name="color">
                    <input type="text" class="form-control mt-3" name="descripcion">
                    <button class="btn btn-primary mt-3">Agregar</button>
                  </form>
                </div>
                </div>
            </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
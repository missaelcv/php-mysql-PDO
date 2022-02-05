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
    
 // header('location:index.php');
 }

 if($_GET){
   $id = $_GET['id'];
   $sql_unico = 'SELECT * FROM colores Where id=?';
    //Crear Variable
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($id));
    $resultado_unico = $gsent_unico->fetch();
 }

//  fa_custom_setup_cdn_webfont(
//   'https://pro.fontawesome.com/releases/v5.10.0/css/all.css',
//   'sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p'
// );
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
     integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"/>

    <!-- <link rel="stylesheet" 
    href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
    integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Hello, world!</title> -->

    
  </head>
  <body>
    
  <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php foreach($resultado as $dato): ?>

        <div  class="alert alert-<?php echo $dato['color'] ?>
         text-uppercase" role="alert">

            <?php echo $dato ['color'] ?>
              
            <?php echo $dato ['descripcion'] ?>

                  <a href="eliminar.php?id=<?php echo $dato['id'] ?> "class="float-right ml-3">
                    <i class="far fa-trash-alt"></i>
                  </a>

                  <a href="index.php?id=<?php echo $dato['id'] ?>" class="float-right">
                    <i class="fas fa-pencil-alt"></i>
                  </a>

            </div>    

            <?php endforeach?>

           </div>
                  <div class="col-md-6">
                    <?php if(!$_GET):?>
                 <h2>Agregar elementos</h2>
                  <form method="POST">
                    <input type="text" class="form-control" name="color">
                    <input type="text" class="form-control mt-3" name="descripcion">
                    <button class="btn btn-primary mt-3">Agregar</button> 
                  </form>
                  <?php endif ?>

                  <?php if($_GET):?>
                 <h2>Editar elementos</h2>
                  <form method="GET" action="editar.php">
                    <input type="text" class="form-control" name="color"
                    value= "<?php echo $resultado_unico['color'] ?>">
                    <input type="text" class="form-control mt-3" name="descripcion"
                    value= "<?php echo $resultado_unico['descripcion'] ?>">
                    <input type = "hidden"  name="id"
                    value= "<?php echo $resultado_unico['id'] ?>">
                    <button class="btn btn-primary mt-3">Agregar</button> 
                  </form>
                  <?php endif ?>
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